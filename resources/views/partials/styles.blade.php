<style>
:root {
    --nv: #0b1120;
    --nl: #111a2e;
    --nm: #162240;
    --bl: #1a6dd4;
    --bb: #2d8cf0;
    --bg2: rgba(26, 109, 212, 0.15);
    --or: #ff6b35;
    --w: #fff;
    --g1: #f4f6f9;
    --g2: #e2e6ed;
    --g4: #9aa3b4;
    --g6: #6b7a90;
    --fh: "Barlow", sans-serif;
    --fb: "Roboto", sans-serif;
    --sh: 0 10px 40px rgba(0, 0, 0, 0.15);
    --r: 8px;
    --t: 0.3s ease;
}

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    overflow-x: hidden;
}

body {
    font-family: var(--fb);
    color: #333;
    line-height: 1.6;
}

a {
    text-decoration: none;
    color: inherit;
}

ul {
    list-style: none;
}

.cn {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 34px;
    border-radius: 4px;
    font-family: var(--fh);
    font-weight: 700;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    border: none;
    transition: var(--t);
}

.btn-p {
    background: var(--bl);
    color: var(--w);
}

.btn-p:hover {
    background: var(--bb);
    transform: translateY(-2px);
}

.btn-o {
    background: var(--or);
    color: var(--w);
}

.btn-o:hover {
    background: #e85d2a;
    transform: translateY(-2px);
}

.btn-ol {
    background: transparent;
    color: var(--w);
    border: 2px solid var(--w);
}

.btn-ol:hover {
    background: var(--w);
    color: var(--nv);
}

.btn-s {
    padding: 10px 24px;
    font-size: 0.82rem;
}

.sh {
    text-align: center;
    margin-bottom: 60px;
}

.ssub {
    font-family: var(--fh);
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: var(--or);
    margin-bottom: 12px;
}

.stt {
    font-family: var(--fh);
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 900;
    color: var(--nv);
    line-height: 1.2;
}

.stt.lt {
    color: var(--w);
}

.sln {
    width: 60px;
    height: 4px;
    background: var(--bl);
    margin: 20px auto 0;
    border-radius: 2px;
}

/* Topbar Styles */
.topbar {
    background: var(--nv);
    padding: 10px 0;
    font-size: 0.82rem;
    color: var(--g4);
}

.tbi {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.tbl {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
}

.tbl span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.tbl i {
    color: var(--bl);
}

.tbs {
    display: flex;
    gap: 10px;
}

.tbs a {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
    color: var(--g4);
    font-size: 0.72rem;
    transition: var(--t);
}

.tbs a:hover {
    background: var(--bl);
    color: var(--w);
}

/* Navbar Styles */
nav.nb {
    /* Default: solid blue at page top — hero is below navbar, not behind it */
    background: #048eef;
    backdrop-filter: blur(0px);
    -webkit-backdrop-filter: blur(0px);
    position: sticky;
    top: 0;
    z-index: 9999;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 4px 20px rgba(4, 142, 239, 0.4);
    transition: background 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease, backdrop-filter 0.4s ease, -webkit-backdrop-filter 0.4s ease;
}

/* State 2: Liquid glass — while scrolling over the hero section */
nav.nb.nb-glass {
    background: rgba(16, 95, 190, 0.24);
    backdrop-filter: blur(18px) saturate(180%) brightness(1.06);
    -webkit-backdrop-filter: blur(18px) saturate(180%) brightness(1.06);
    border-bottom: 1px solid rgba(255, 255, 255, 0.22);
    box-shadow:
        0 8px 32px rgba(10, 60, 140, 0.22),
        inset 0 1px 0 rgba(255, 255, 255, 0.42),
        inset 0 -1px 0 rgba(0, 0, 0, 0.08);
}

/* State 3: #156dc5 base + subtle glass shimmer over white sections */
nav.nb.nb-dark {
    background: rgb(21, 109, 197);
    backdrop-filter: none;
    -webkit-backdrop-filter: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow:
        0 4px 20px rgba(21, 109, 197, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.28),
        inset 0 -1px 0 rgba(0, 0, 0, 0.06);
}

/* Specular highlights — only active in glass state */
nav.nb::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 55%;
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.16) 0%, transparent 100%);
    pointer-events: none;
    z-index: 0;
    opacity: 0;
    transition: opacity 0.4s ease;
}

nav.nb::after {
    content: '';
    position: absolute;
    inset: 1px;
    background: radial-gradient(ellipse at 50% 0%, rgba(255, 255, 255, 0.12), transparent 70%);
    pointer-events: none;
    z-index: 0;
    opacity: 0;
    transition: opacity 0.4s ease;
}

nav.nb.nb-glass::before,
nav.nb.nb-glass::after,
nav.nb.nb-dark::before,
nav.nb.nb-dark::after {
    opacity: 1;
}

.ni {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    height: 70px;
    position: relative;
    z-index: 1;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    height: 66px;
    width: auto;
}

.logo-name {
    flex: 1;
    text-align: center;
    font-family: var(--fh);
    font-size: 1.25rem;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 1px;
    text-transform: uppercase;
    white-space: nowrap;
}

.logo-name b {
    color: #f96900;
    font-weight: 900;
}

.nmn {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70px;
}

.nr {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
}

.nmn a {
    padding: 0 28px;
    height: 70px;
    display: flex;
    align-items: center;
    font-family: var(--fh);
    font-size: 0.88rem;
    font-weight: 600;
    color: #E8F0FE;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    transition: var(--t);
    position: relative;
}

.nmn a:hover,
.nmn a.active {
    color: #ffffff;
}

.nmn a::after {
    content: "";
    position: absolute;
    bottom: -3px;
    left: 50%;
    right: 50%;
    height: 3px;
    background: rgba(255, 255, 255, 0.75);
    border-radius: 3px 3px 0 0;
    transition: var(--t);
}

.nmn a:hover::after,
.nmn a.active::after {
    left: 0;
    right: 0;
}

.nr {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nsr {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1.5px solid #E8F0FE;
    color: #E8F0FE;
    cursor: pointer;
    transition: var(--t);
    font-size: 0.85rem;
}

.nsr:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: #ffffff;
    color: #fff;
}

.btn-nq {
    background: #FF6B2B;
    color: #ffffff;
    font-family: var(--fh);
    font-weight: 700;
    font-size: 0.87rem;
    padding: 10px 28px;
    border-radius: 25px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: var(--t);
    box-shadow: 0 3px 14px rgba(255, 107, 43, 0.45);
    white-space: nowrap;
}

.btn-nq:hover {
    background: #E55A1A;
    color: #ffffff;
    box-shadow: 0 5px 20px rgba(255, 107, 43, 0.6);
    transform: translateY(-1px);
}

.hbr {
    display: none;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 10px;
}

.hbr span {
    display: block;
    width: 22px;
    height: 2px;
    background: var(--w);
    margin: 5px 0;
}

/* Hero Section */
.hero {
    position: relative;
    min-height: 600px;
    background: linear-gradient(135deg, #1162b8 0%, #197ad4 45%, #1b82de 75%, #1265bc 100%);
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 70% 50%, rgba(255, 255, 255, 0.08), transparent 55%);
}

.hbg {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
    background-size: 80px 80px;
}

.hg {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    padding: 80px 0;
}

.hsub {
    font-family: var(--fh);
    font-size: 0.95rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 4px;
    color: #ff8c4a;
    margin-bottom: 16px;
}

.htl {
    font-family: var(--fh);
    font-size: clamp(2.4rem, 5vw, 3.6rem);
    font-weight: 900;
    color: var(--w);
    line-height: 1.1;
    margin-bottom: 20px;
}

.htl b {
    color: var(--or);
    font-weight: 900;
}

.hd {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.82);
    line-height: 1.8;
    margin-bottom: 36px;
    max-width: 480px;
}

.hbt {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.hv {
    position: relative;
}

.cc {
    background: rgba(17, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 20px;
}

.cg {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
}

.cp {
    aspect-ratio: 16/10;
    background: var(--nv);
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.cp .scl {
    position: relative;
    width: 100%;
    height: 200px;
    background: black;
    overflow: hidden;
}

.cp .scl video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cp .scl::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--bl), transparent);
    animation: scd 4s linear infinite;
}

@keyframes scd {
    0% {
        top: 0;
    }
    100% {
        top: 100%;
    }
}

.cp .cml {
    position: absolute;
    bottom: 6px;
    left: 8px;
    font-family: var(--fh);
    font-size: 0.6rem;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.4);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cp .cdt {
    position: absolute;
    top: 6px;
    right: 8px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #22c55e;
    animation: blk 2s infinite;
}

@keyframes blk {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.3;
    }
}

.cmb {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.06);
}

.cms {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.72rem;
    font-weight: 600;
    color: #22c55e;
    font-family: var(--fh);
}

.cmt {
    font-family: "Courier New", monospace;
    font-size: 0.72rem;
    color: var(--g4);
}

.hfl {
    position: absolute;
    z-index: 3;
    background: rgba(17, 26, 46, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    animation: fy 5s ease-in-out infinite;
}

@keyframes fy {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.hfl.f1 {
    top: 10px;
    right: -10px;
}

.hfl.f2 {
    bottom: -10px;
    left: 20px;
    animation-delay: 1.5s;
}

.fic {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.fic.fb1 {
    background: var(--bg2);
    color: var(--bb);
}

.fic.fo1 {
    background: rgba(255, 107, 53, 0.15);
    color: var(--or);
}

.ftx {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--w);
    font-family: var(--fh);
}

.fsx {
    font-size: 0.65rem;
    color: var(--g4);
}

/* Info Strip */
.istr {
    background: rgb(30, 66, 110);
    position: relative;
    z-index: 10;
}

.igr {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}

.iit {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 28px 24px;
    border-right: 1px solid rgba(255, 255, 255, 0.15);
    transition: var(--t);
}

.iit:last-child {
    border-right: none;
}

.iit:hover {
    background: rgba(0, 0, 0, 0.1);
}

.iico {
    width: 50px;
    height: 50px;
    min-width: 50px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: var(--w);
}

.iitx h4 {
    font-family: var(--fh);
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--w);
}

.iitx p {
    font-size: 0.78rem;
    color: rgba(255, 255, 255, 0.7);
    margin-top: 2px;
}

/* About Section */
.about {
    padding: 60px 0 0;
    background: linear-gradient(to bottom, #dceef9 85%, #d4e8f6 100%);
}

.abg {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.abi {
    position: relative;
}

.abm {
    width: 85%;
    aspect-ratio: 4/3;
    background: linear-gradient(135deg, var(--nl), var(--nm));
    border-radius: var(--r);
    position: relative;
    box-shadow: var(--sh);
    display: flex;
    align-items: center;
    justify-content: center;
}

.abm > i {
    font-size: 4rem;
    color: var(--bl);
    opacity: 0.3;
}

.abs2 {
    position: absolute;
    bottom: -30px;
    right: 0;
    width: 55%;
    aspect-ratio: 4/3;
    background: var(--bl);
    border-radius: var(--r);
    border: 6px solid var(--w);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--sh);
}

.abs2 > i {
    font-size: 3rem;
    color: var(--w);
    opacity: 0.4;
}

.exb {
    position: absolute;
    top: -20px;
    right: 40px;
    background: var(--or);
    color: var(--w);
    padding: 18px 22px;
    border-radius: var(--r);
    text-align: center;
}

.exb .en {
    font-family: var(--fh);
    font-size: 2.4rem;
    font-weight: 900;
    line-height: 1;
}

.exb .el {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.abc .ssub,
.abc .stt {
    text-align: left;
}

.abc .stt {
    margin-bottom: 20px;
}

.abt {
    color: var(--g6);
    margin-bottom: 28px;
    line-height: 1.8;
}

.abf {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 32px;
}

.afi {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: var(--fh);
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--nv);
}

.afi i {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--bl);
    color: var(--w);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.55rem;
}

/* Services Section */
.svc {
    padding: 60px 0 0;
    background: linear-gradient(to bottom, #d4e8f6 85%, #dceef9 100%);
}

.svg2 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}

.scard {
    background: var(--w);
    border-radius: var(--r);
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: var(--t);
    position: relative;
    overflow: hidden;
}

.scard::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--bl);
    transform: scaleX(0);
    transition: var(--t);
}

.scard:hover {
    transform: translateY(-8px);
    box-shadow: var(--sh);
}

.scard:hover::before {
    transform: scaleX(1);
}

.siw {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: var(--bg2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 1.5rem;
    color: var(--bl);
    transition: var(--t);
}

.scard:hover .siw {
    background: var(--bl);
    color: var(--w);
}

.scard h3 {
    font-family: var(--fh);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--nv);
    margin-bottom: 12px;
}

.scard p {
    font-size: 0.9rem;
    color: var(--g6);
    line-height: 1.7;
    margin-bottom: 20px;
}

.slnk {
    font-family: var(--fh);
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--bl);
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: var(--t);
}

.slnk:hover {
    color: var(--or);
}

/* Products Section */
.prod {
    padding: 60px 0px 60px;
    background: linear-gradient(to bottom, #dceef9 85%, #d4e8f6 100%);
}

.prgd {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.pcd {
    background: var(--w);
    border-radius: var(--r);
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: var(--t);
    border: 1px solid var(--g2);
}

.pcd:hover {
    transform: translateY(-8px);
    box-shadow: var(--sh);
    border-color: var(--bl);
}

.pim {
    height: 220px;
    background: var(--g1);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.pim::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle, var(--bg2), transparent 70%);
}

.pim > i {
    font-size: 3.5rem;
    color: var(--nv);
    opacity: 0.2;
    position: relative;
    z-index: 1;
}

.pim img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pbdg {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 4px 14px;
    border-radius: 4px;
    font-family: var(--fh);
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    z-index: 2;
}

.pbh {
    background: var(--or);
    color: var(--w);
}

.pbn {
    background: var(--bl);
    color: var(--w);
}

.pbsl {
    background: #22c55e;
    color: var(--w);
}

.pact {
    position: absolute;
    top: 50%;
    right: -50px;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 6px;
    transition: var(--t);
    z-index: 2;
}

.pcd:hover .pact {
    right: 12px;
}

.pab {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--w);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    color: var(--nv);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    transition: var(--t);
    border: none;
}

.pab:hover {
    background: var(--bl);
    color: var(--w);
}

.pinf {
    padding: 20px;
}

.pcat {
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--bl);
    margin-bottom: 6px;
}

.pinf h3 {
    font-family: var(--fh);
    font-size: 1rem;
    font-weight: 700;
    color: var(--nv);
    margin-bottom: 10px;
    line-height: 1.3;
}

.prat {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 12px;
}

.prat i {
    font-size: 0.72rem;
    color: #fbbf24;
}

.prat span {
    font-size: 0.75rem;
    color: var(--g4);
    margin-left: 4px;
}

.pprow {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.pprc {
    font-family: var(--fh);
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--bl);
}

.pprc .old {
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--g4);
    text-decoration: line-through;
    margin-left: 6px;
}

.pcrt {
    padding: 8px 20px;
    background: var(--nv);
    color: var(--w);
    border: none;
    border-radius: 4px;
    font-family: var(--fh);
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: var(--t);
}

.pcrt:hover {
    background: var(--bl);
}

/* Why Choose Us */
.why {
    padding: 55px 0;
    background: #0d3a75;
    position: relative;
    overflow: hidden;
}

.why::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.06), transparent 50%);
}

.why .sln {
    background: rgba(255, 255, 255, 0.4);
}

.why .ssub,
.testi .ssub,
.about .ssub,
.svc .ssub,
.prod .ssub {
    font-size: 0.95rem;
    font-weight: 800;
    color: #ff8c4a;
}

.wgd {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
    position: relative;
    z-index: 1;
}

.wcr {
    text-align: center;
}

.wic {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.6rem;
    color: rgba(255, 255, 255, 0.9);
    transition: var(--t);
}

.wcr:hover .wic {
    background: var(--or);
    border-color: var(--or);
    color: var(--w);
    transform: scale(1.1);
}

.wcr h3 {
    font-family: var(--fh);
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--w);
    margin-bottom: 4px;
}

.wcr p {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.75);
}

/* Testimonials */
.testi {
    padding: 60px 0;
    background: #d4e8f6;
}

.tgd {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}

.tcr {
    background: var(--w);
    border-radius: var(--r);
    padding: 36px 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: var(--t);
}

.tcr:hover {
    transform: translateY(-4px);
    box-shadow: var(--sh);
}

.tqt {
    font-size: 3rem;
    color: var(--bl);
    opacity: 0.15;
    font-family: Georgia, serif;
    line-height: 1;
    margin-bottom: 8px;
}

.ttx {
    font-size: 0.92rem;
    color: var(--g6);
    line-height: 1.8;
    font-style: italic;
    margin-bottom: 24px;
}

.tau {
    display: flex;
    align-items: center;
    gap: 14px;
}

.tav {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--bl), var(--bb));
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--fh);
    font-weight: 800;
    color: var(--w);
    font-size: 0.9rem;
}

.tnm {
    font-family: var(--fh);
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--nv);
}

.trl {
    font-size: 0.78rem;
    color: var(--g4);
}

.tst {
    display: flex;
    gap: 3px;
    margin-top: 4px;
}

.tst i {
    font-size: 0.65rem;
    color: #fbbf24;
}

/* CTA Section */
.cta {
    padding: 55px 0;
    background: linear-gradient(135deg, var(--bl), #1255a8);
    text-align: center;
    position: relative;
    overflow: hidden;
    z-index: 0;
}

.cta::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.08), transparent 50%);
}

.cta > * {
    position: relative;
    z-index: 1;
}

.cta h2 {
    font-family: var(--fh);
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 900;
    color: var(--w);
    margin-bottom: 16px;
}

.cta p {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 32px;
    text-align: center;
}

.ctab {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Footer */
footer {
    background: var(--nv);
    padding: 55px 0 0;
}

.fgd {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
    gap: 50px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
}

.fbd .logo {
    margin-bottom: 8px;
}

.flogo {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: var(--fh);
    font-size: 1.25rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.flogo i {
    color: var(--bl);
    font-size: 1.3rem;
}

.flogo-nex {
    color: var(--bl);
}

.flogo-gen {
    color: #ff6b2b;
}

.fbd > p {
    font-size: 0.88rem;
    color: var(--g4);
    line-height: 1.8;
    margin-bottom: 12px;
}

.fso {
    display: flex;
    gap: 10px;
}

.fso a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--g4);
    font-size: 0.85rem;
    transition: var(--t);
}

.fso a:hover {
    background: var(--bl);
    color: var(--w);
}

.fcl h4 {
    font-family: var(--fh);
    font-size: 1rem;
    font-weight: 700;
    color: var(--w);
    margin-bottom: 24px;
    position: relative;
    padding-bottom: 12px;
}

.fcl h4::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: var(--bl);
    border-radius: 2px;
}

.fcl ul {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.fcl li a {
    font-size: 0.88rem;
    color: var(--g4);
    transition: var(--t);
    display: flex;
    align-items: center;
    gap: 8px;
}

.fcl li a:hover {
    color: var(--w);
    padding-left: 4px;
}

.fcl li a i {
    font-size: 0.6rem;
    color: var(--bl);
}

.fcn li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.88rem;
    color: var(--g4);
    margin-bottom: 16px;
}

.fcn li i {
    color: var(--bl);
    margin-top: 4px;
    min-width: 16px;
}

.fbt {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 0;
    font-size: 0.82rem;
    color: var(--g6);
}

.fbt a {
    color: var(--bl);
}

.fln {
    display: flex;
    gap: 20px;
}

.fln a {
    color: var(--g4);
    transition: var(--t);
}

.fln a:hover {
    color: var(--w);
}

/* Scroll to Top Button */
.stp {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: var(--bl);
    color: var(--w);
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    z-index: 1000;
    transition: var(--t);
}

.stp:hover {
    background: var(--nv);
}

.stp.v {
    display: flex;
}

/* Reveal Animation */
.rv {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}

.rv.ac {
    opacity: 1;
    transform: translateY(0);
}

/* Mobile Navigation */
.mobn {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(11, 17, 32, 0.98);
    z-index: 2000;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 28px;
}

.mobn.open {
    display: flex;
}

.mobn a {
    font-family: var(--fh);
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--w);
    text-transform: uppercase;
}

.mobn .clb {
    position: absolute;
    top: 24px;
    right: 24px;
    background: transparent;
    border: none;
    color: var(--w);
    font-size: 2rem;
    cursor: pointer;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hg {
        grid-template-columns: 1fr;
    }
    .hv {
        max-width: 500px;
        margin: 0 auto;
    }
    .abg {
        grid-template-columns: 1fr;
        gap: 60px;
    }
    .svg2 {
        grid-template-columns: repeat(2, 1fr);
    }
    .prgd {
        grid-template-columns: repeat(2, 1fr);
    }
    .wgd {
        grid-template-columns: repeat(2, 1fr);
    }
    .fgd {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .tbi {
        flex-direction: column;
        text-align: center;
    }
    .nmn,
    .nsr {
        display: none;
    }
    .hbr {
        display: block;
    }
    .igr {
        grid-template-columns: 1fr 1fr;
    }
    .svg2,
    .tgd {
        grid-template-columns: 1fr;
    }
    .prgd {
        grid-template-columns: 1fr 1fr;
    }
    .abf {
        grid-template-columns: 1fr;
    }
    .fgd {
        grid-template-columns: 1fr;
        gap: 36px;
    }
    .fbt {
        flex-direction: column;
        gap: 12px;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .igr,
    .prgd,
    .wgd {
        grid-template-columns: 1fr;
    }
    .hbt {
        flex-direction: column;
    }
    .hbt .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
