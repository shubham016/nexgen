<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>NEXGEN - Product Report {{ now()->format('d M Y') }}</title> -->
    <title>NEXGEN - Product Report</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 12px; color: #222; background: #e8ecf0; }
        .page { background: #fff; width: 210mm; min-height: 297mm; margin: 0 auto; }

        /* ── LETTERHEAD ─────────────────────────────── */
        .letterhead { position: relative; overflow: hidden; min-height: 130px; }
        .letterhead-bg {
            position: absolute; inset: 0;
            background: url('{{ asset('images/format_img2.jpeg') }}') center center / cover no-repeat;
            opacity: 0.28;
        }
        .letterhead-content {
            position: relative;
            display: flex; align-items: center; gap: 18px;
            padding: 18px 28px 14px;
            border-bottom: 3px solid #1a6dd4;
        }
        .letterhead-logo img { width: 72px; height: 72px; object-fit: contain; }
        .letterhead-divider { width: 2px; background: #1a6dd4; align-self: stretch; opacity: .4; }
        .letterhead-info { flex: 1; }
        .letterhead-info .company-name {
            font-size: 19px; font-weight: 800; color: #1a3a6d; letter-spacing: .5px; line-height: 1.1;
        }
        .letterhead-info .company-sub {
            font-size: 10.5px; color: #444; margin-top: 6px; line-height: 2;
        }
        .letterhead-info .company-sub span { margin-right: 16px; }
        .letterhead-report { text-align: right; white-space: nowrap; }
        .letterhead-report .report-title {
            font-size: 13px; font-weight: 700; color: #1a6dd4;
            text-transform: uppercase; letter-spacing: .8px;
        }
        .letterhead-report .report-meta { font-size: 10px; color: #555; margin-top: 5px; line-height: 1.9; }

        /* ── BODY ───────────────────────────────────── */
        .body { padding: 20px 28px 28px; }

        /* ── SUMMARY CARDS ──────────────────────────── */
        .summary { display: flex; gap: 12px; margin-bottom: 20px; }
        .summary-card {
            flex: 1; border: 1px solid #ccd6ea; border-radius: 6px;
            padding: 10px 12px; text-align: center; background: #f5f8ff;
        }
        .summary-card .s-value { font-size: 17px; font-weight: 800; color: #1a3a6d; }
        .summary-card .s-label { font-size: 9px; color: #888; margin-top: 2px; text-transform: uppercase; letter-spacing: .4px; }

        /* ── SECTION TITLE ──────────────────────────── */
        .section-title {
            font-size: 11px; font-weight: 700; color: #1a3a6d;
            text-transform: uppercase; letter-spacing: .5px;
            margin-bottom: 8px; padding-bottom: 4px;
            border-bottom: 2px solid #1a6dd4;
        }

        /* ── TABLE ──────────────────────────────────── */
        table {
            width: 100%; border-collapse: collapse;
            border: 1.5px solid #1a6dd4;
            margin-bottom: 20px;
        }
        thead tr { background: #1a6dd4; color: #fff; }
        thead th {
            padding: 7px 8px; text-align: center;
            font-size: 10px; font-weight: 700;
            border-right: 1px solid #1558b0;
            border-bottom: 1.5px solid #1558b0;
            white-space: nowrap;
        }
        thead th:last-child { border-right: none; }
        tbody td {
            padding: 6px 8px;
            border-right: 1px solid #c5d3e8;
            border-bottom: 1px solid #c5d3e8;
            font-size: 10.5px; vertical-align: middle;
            text-align: center;
        }
        tbody td:last-child { border-right: none; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:nth-child(even) { background: #f2f6ff; }

        /* ── BADGES ─────────────────────────────────── */
        .badge { display:inline-block; padding:2px 7px; border-radius:10px; font-size:9.5px; font-weight:600; border:1px solid transparent; }
        .b-active   { background:#d1fae5; color:#065f46; border-color:#a7f3d0; }
        .b-draft    { background:#e5e7eb; color:#374151; border-color:#d1d5db; }
        .b-archived { background:#fee2e2; color:#991b1b; border-color:#fca5a5; }
        .b-hot      { background:#fee2e2; color:#991b1b; border-color:#fca5a5; }
        .b-new      { background:#dbeafe; color:#1e40af; border-color:#93c5fd; }
        .b-sale     { background:#fef3c7; color:#92400e; border-color:#fde68a; }

        .stars      { color:#f59e0b; }
        .stock-ok   { color:#065f46; font-weight:700; }
        .stock-low  { color:#92400e; font-weight:700; }
        .stock-zero { color:#991b1b; font-weight:700; }

        /* ── FOOTER ─────────────────────────────────── */
        .footer {
            text-align: center; font-size: 9.5px; color: #aaa;
            padding: 10px 28px 16px;
            border-top: 1px solid #e0e0e0;
        }

        /* ── TOP ACTION BAR ─────────────────────────── */
        .no-print {
            background: #1a3a6d; color: #fff;
            padding: 10px 20px;
            display: flex; align-items: center; gap: 10px;
            position: sticky; top: 0; z-index: 10;
        }
        .btn-p { background:#1a6dd4; color:#fff; border:none; padding:7px 18px; border-radius:4px; cursor:pointer; font-size:12px; font-weight:600; }
        .btn-p:hover { background:#1558b0; }
        .btn-c { background:transparent; color:#ccc; border:1px solid #555; padding:7px 14px; border-radius:4px; cursor:pointer; font-size:12px; }
        .no-print small { color:#7aa4d8; font-size:11px; margin-left:6px; }

        @media print {
            @page { margin: 0; }
            .no-print { display: none !important; }
            body { background: #fff; }
            .page { width: 100%; margin: 0; padding: 14mm 15mm; box-shadow: none; }
        }
        @media screen {
            body { padding: 16px 0 40px; }
            .page { box-shadow: 0 4px 28px rgba(0,0,0,.18); }
        }
    </style>
</head>
<body>

{{-- Action bar --}}
<div class="no-print">
    <button class="btn-p" onclick="window.print()">🖨&nbsp; Print / Save as PDF</button>
    <button class="btn-c" onclick="window.close()">✕ Close</button>
    <small>To save as PDF: Print → Destination → "Save as PDF"</small>
</div>

<div class="page">

    {{-- ── LETTERHEAD ── --}}
    <div class="letterhead">
        <div class="letterhead-bg"></div>
        <div class="letterhead-content">
            <div class="letterhead-logo">
                <img src="{{ asset('images/format_logo.png') }}" alt="NEXGen Logo">
            </div>
            <div class="letterhead-divider"></div>
            <div class="letterhead-info">
                <div class="company-name">NEXGEN BUILDTECH PVT. LTD.</div>
                <div class="company-sub">
                    <span>📍 Nepalgunj-18, Banke, Nepal</span>
                    <span>📞 +977-9768442449</span><br>
                    <span>✉ info@nexgenbuildtech.com</span>
                    <span>🔖 PAN: 62243462</span>
                </div>
            </div>
            <div class="letterhead-report">
                <div class="report-title">Product Report</div>
                <div class="report-meta">
                    Generated: {{ now()->format('d M Y, h:i A') }}<br>
                    Total Products: {{ $products->count() }}<br>
                    Generated by: Admin
                </div>
            </div>
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="body">

        {{-- Summary --}}
        <div class="summary">
            <div class="summary-card">
                <div class="s-value">{{ $products->count() }}</div>
                <div class="s-label">Active Products</div>
            </div>
            <div class="summary-card">
                <div class="s-value">Rs {{ number_format($totalStockValue, 0) }}</div>
                <div class="s-label">Total Stock Value</div>
            </div>
            <div class="summary-card">
                <div class="s-value">Rs {{ number_format($avgPrice, 0) }}</div>
                <div class="s-label">Avg Product Price</div>
            </div>
            <div class="summary-card">
                <div class="s-value">{{ $products->sum('stock') }}</div>
                <div class="s-label">Total Units in Stock</div>
            </div>
        </div>

        {{-- Product Table --}}
        <div class="section-title">Product Inventory</div>
        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Product Name</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Old Price</th>
                    <th>Stock</th>
                    <!-- <th>Rating</th> -->
                    <!-- <th>Badge</th> -->
                    <!-- <th>Status</th> -->
                    <th>Added</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $i => $product)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td style="color:#888;">{{ $product->sku ?? '—' }}</td>
                    <td>{{ $product->category?->name ?? '—' }}</td>
                    <td><strong>Rs {{ number_format($product->price, 0) }}</strong></td>
                    <td style="color:#bbb;text-decoration:line-through;">
                        {{ $product->old_price ? 'Rs '.number_format($product->old_price,0) : '—' }}
                    </td>
                    <td>
                        @if($product->stock > 10)
                            <span class="stock-ok">{{ $product->stock }}</span>
                        @elseif($product->stock > 0)
                            <span class="stock-low">{{ $product->stock }}</span>
                        @else
                            <span class="stock-zero">0</span>
                        @endif
                    </td>
                    <!-- <td>
                        <span class="stars">{{ str_repeat('★', (int) $product->rating) }}</span>
                        {{ number_format($product->rating, 1) }}
                    </td> -->
                    <!-- <td>
                        @if($product->badge)
                            <span class="badge b-{{ $product->badge }}">{{ ucfirst($product->badge) }}</span>
                        @else <span style="color:#ccc;">—</span>
                        @endif
                    </td> -->
                    <!-- <td><span class="badge b-{{ $product->status }}">{{ ucfirst($product->status) }}</span></td> -->
                    <td style="color:#888;white-space:nowrap;">{{ $product->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" style="text-align:center;padding:20px;color:#aaa;">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>{{-- /.body --}}

    {{-- ── FOOTER ── --}}
    <!-- <div class="footer">
        NEXGEN BUILDTECH PVT. LTD. &nbsp;·&nbsp; Nepalgunj-18, Banke, Nepal &nbsp;·&nbsp;
        info@nexgenbuildtech.com &nbsp;·&nbsp; Report generated {{ now()->format('d M Y') }}
    </div> -->

</div>{{-- /.page --}}
</body>
</html>
