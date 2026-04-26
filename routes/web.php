<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HeroCameraController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\HeroCamera;
use App\Models\Product;
use App\Models\Stat;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

// Frontend Website Routes — products: no limit, featured first
Route::get('/', function () {
    $products     = Product::with('category')->where('status', 'active')
        ->orderByDesc('is_featured')->orderByDesc('created_at')->get();
    $stats        = Stat::ordered()->get();
    $testimonials = Testimonial::active()->ordered()->get();
    $cameras      = HeroCamera::active()->ordered()->take(4)->get();
    return view('home', compact('products', 'stats', 'testimonials', 'cameras'));
})->name('home');

// Clean URL routes for single-page sections (all share same home view)
$homeData = function () {
    $products     = Product::with('category')->where('status', 'active')
        ->orderByDesc('is_featured')->orderByDesc('created_at')->get();
    $stats        = Stat::ordered()->get();
    $testimonials = Testimonial::active()->ordered()->get();
    $cameras      = HeroCamera::active()->ordered()->take(4)->get();
    return view('home', compact('products', 'stats', 'testimonials', 'cameras'));
};
Route::get('/about',    $homeData);
Route::get('/services', $homeData);
Route::get('/products', $homeData);
Route::get('/reviews',  $homeData);
Route::get('/contact',  $homeData);

// Contact Form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dashboard route - redirects to admin dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Panel Routes (Protected by authentication)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/', function () {
        $totalProducts    = \App\Models\Product::where('status', 'active')->count();
        $totalCategories  = \App\Models\Category::count();
        $lowStockProducts = \App\Models\Product::where('stock', '<=', 5)->where('stock', '>', 0)->count();
        $outOfStock       = \App\Models\Product::where('stock', 0)->count();
        $recentProducts   = \App\Models\Product::with('category')->latest()->take(5)->get();
        $topRated         = \App\Models\Product::with('category')->where('status', 'active')
                                ->orderByDesc('rating')->take(4)->get();
        return view('admin.dashboard', compact(
            'totalProducts', 'totalCategories', 'lowStockProducts',
            'outOfStock', 'recentProducts', 'topRated'
        ));
    })->name('dashboard');

    // Inventory
    Route::get('/inventory', [ProductController::class, 'index'])->name('inventory');

    // Products CRUD
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/create',        [ProductController::class, 'create'])->name('create');
        Route::post('/',             [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit',[ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}',     [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}',  [ProductController::class, 'destroy'])->name('destroy');
    });

    // Categories CRUD
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/',              [CategoryController::class, 'index'])->name('index');
        Route::get('/create',        [CategoryController::class, 'create'])->name('create');
        Route::post('/',             [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit',   [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}',        [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}',     [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Hero Camera Feeds CRUD
    Route::prefix('hero-cameras')->name('hero-cameras.')->group(function () {
        Route::get('/',                    [HeroCameraController::class, 'index'])->name('index');
        Route::get('/create',              [HeroCameraController::class, 'create'])->name('create');
        Route::post('/',                   [HeroCameraController::class, 'store'])->name('store');
        Route::get('/{heroCamera}/edit',   [HeroCameraController::class, 'edit'])->name('edit');
        Route::put('/{heroCamera}',        [HeroCameraController::class, 'update'])->name('update');
        Route::delete('/{heroCamera}',     [HeroCameraController::class, 'destroy'])->name('destroy');
    });

    // Why Choose Us Stats CRUD
    Route::prefix('stats')->name('stats.')->group(function () {
        Route::get('/',              [StatController::class, 'index'])->name('index');
        Route::get('/create',        [StatController::class, 'create'])->name('create');
        Route::post('/',             [StatController::class, 'store'])->name('store');
        Route::get('/{stat}/edit',   [StatController::class, 'edit'])->name('edit');
        Route::put('/{stat}',        [StatController::class, 'update'])->name('update');
        Route::delete('/{stat}',     [StatController::class, 'destroy'])->name('destroy');
    });

    // Testimonials CRUD
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/',                        [TestimonialController::class, 'index'])->name('index');
        Route::get('/create',                  [TestimonialController::class, 'create'])->name('create');
        Route::post('/',                       [TestimonialController::class, 'store'])->name('store');
        Route::get('/{testimonial}/edit',      [TestimonialController::class, 'edit'])->name('edit');
        Route::put('/{testimonial}',           [TestimonialController::class, 'update'])->name('update');
        Route::delete('/{testimonial}',        [TestimonialController::class, 'destroy'])->name('destroy');
    });

    // Report Downloads
    Route::get('/reports/download/csv', function () {
        $products = \App\Models\Product::with('category')->latest()->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Products');

        // Header row
        $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $headers = ['S.N.', 'Name', 'Model', 'Category', 'Price (Rs)', 'Old Price (Rs)', 'Stock', 'Added'];
        foreach ($headers as $i => $heading) {
            $cell = $columns[$i] . '1';
            $sheet->setCellValue($cell, $heading);
            $sheet->getStyle($cell)->applyFromArray([
                'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 'size' => 11],
                'fill'      => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF000000']],
                'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
                'borders'   => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FF444444']]],
            ]);
        }

        // Data rows
        foreach ($products as $i => $p) {
            $row  = $i + 2;
            $bg   = ($i % 2 === 0) ? 'FFFFFFFF' : 'FFF5F5F5';
            $data = [
                $i + 1,
                $p->name,
                $p->sku ?? '—',
                $p->category?->name ?? '—',
                'Rs ' . number_format($p->price, 2),
                $p->old_price ? 'Rs ' . number_format($p->old_price, 2) : '—',
                $p->stock,
                $p->created_at->format('Y-m-d'),
            ];
            foreach ($data as $ci => $value) {
                $cell = $columns[$ci] . $row;
                $sheet->setCellValue($cell, $value);
                $sheet->getStyle($cell)->applyFromArray([
                    'fill'      => ['fillType' => 'solid', 'startColor' => ['argb' => $bg]],
                    'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
                    'borders'   => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFDDDDDD']]],
                ]);
            }
        }

        // Auto-size columns
        foreach ($columns as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = 'nexgen-products-' . now()->format('Y-m-d') . '.xlsx';
        $writer   = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        $tempPath = tempnam(sys_get_temp_dir(), 'nexgen_') . '.xlsx';
        $writer->save($tempPath);

        return response()->download($tempPath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    })->name('reports.csv');  // resolves to admin.reports.csv

    Route::get('/reports/print', function () {
        $products        = \App\Models\Product::with('category')->where('status', 'active')
                               ->orderByDesc('is_featured')->orderByDesc('created_at')->get();
        $totalStockValue = $products->sum(fn($p) => $p->price * $p->stock);
        $avgPrice        = $products->avg('price') ?? 0;
        return view('admin.reports.print', compact('products', 'totalStockValue', 'avgPrice'));
    })->name('reports.print');

    Route::get('/reports/download/pdf', function () {
        $products        = \App\Models\Product::with('category')->where('status', 'active')
                               ->orderByDesc('is_featured')->orderByDesc('created_at')->get();
        $totalStockValue = $products->sum(fn($p) => $p->price * $p->stock);
        $avgPrice        = $products->avg('price') ?? 0;

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.reports.pdf',
                    compact('products', 'totalStockValue', 'avgPrice'))
               ->setPaper('a4', 'portrait');

        return $pdf->download('nexgen-products-' . now()->format('Y-m-d') . '.pdf');
    })->name('reports.pdf');

    // Messages (Contact Enquiries)
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('/',              [MessageController::class, 'index'])->name('index');
        Route::get('/{message}',     [MessageController::class, 'show'])->name('show');
        Route::delete('/{message}',  [MessageController::class, 'destroy'])->name('destroy');
    });

    // Reports
    Route::get('/reports', function () {
        $totalProducts    = \App\Models\Product::where('status', 'active')->count();
        $totalCategories  = \App\Models\Category::count();
        $totalStockValue  = \App\Models\Product::where('status', 'active')
                                ->selectRaw('SUM(price * stock) as value')->value('value') ?? 0;
        $avgPrice         = \App\Models\Product::where('status', 'active')->avg('price') ?? 0;

        $inStock    = \App\Models\Product::where('stock', '>', 10)->count();
        $lowStock   = \App\Models\Product::where('stock', '>', 0)->where('stock', '<=', 10)->count();
        $outOfStock = \App\Models\Product::where('stock', 0)->count();

        $byCategory = \App\Models\Category::withCount(['products' => fn($q) => $q->where('status','active')])
                        ->having('products_count', '>', 0)->orderByDesc('products_count')->get();

        $topRated = \App\Models\Product::with('category')->where('status', 'active')
                        ->orderByDesc('rating')->take(6)->get();

        $recentProducts = \App\Models\Product::with('category')->latest()->take(8)->get();

        return view('admin.reports', compact(
            'totalProducts', 'totalCategories', 'totalStockValue', 'avgPrice',
            'inStock', 'lowStock', 'outOfStock',
            'byCategory', 'topRated', 'recentProducts'
        ));
    })->name('reports');

});

// Auth routes
require __DIR__.'/auth.php';
