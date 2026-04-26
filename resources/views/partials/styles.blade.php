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
    background: #dceef9;
    padding: 10px 0;
    font-size: 0.82rem;
    color: #1a3a5c;
    border-bottom: 1px solid rgba(26, 109, 212, 0.15);
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
    background: rgba(26, 109, 212, 0.12);
    color: #1a6dd4;
    font-size: 0.72rem;
    transition: var(--t);
}

.tbs a:hover {
    background: var(--bl);
    color: var(--w);
}

/* Navbar Styles */
nav.nb {
    background: #f5f8ff;
    backdrop-filter: blur(0px);
    -webkit-backdrop-filter: blur(0px);
    position: sticky;
    top: 0;
    z-index: 9999;
    border-bottom: 1px solid #e0e8f5;
    box-shadow: none;
    transition: background 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease, backdrop-filter 0.4s ease, -webkit-backdrop-filter 0.4s ease;
}

/* State 2: Frosted white glass — while scrolling over hero */
nav.nb.nb-glass {
    background: rgba(255, 255, 255, 0.82);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
}

/* State 3: scrolled — add a gentle lift shadow */
nav.nb.nb-dark {
    background: #f5f8ff;
    backdrop-filter: none;
    -webkit-backdrop-filter: none;
    border-bottom: 1px solid #e8e8e8;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
}

nav.nb::before,
nav.nb::after {
    display: none;
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
    height: 90px;
    width: auto;
    margin: -5px 0 -15px 0;
}

.logo-name {
    flex: 1;
    text-align: center;
    font-family: var(--fh);
    font-size: 1.25rem;
    font-weight: 900;
    color: #2081da;
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
    color: #444444;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    transition: var(--t);
    position: relative;
}

.nmn a:hover,
.nmn a.active {
    color: #111111;
}

.nmn a::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    right: 50%;
    height: 3px;
    background: #111111;
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
    border: 1.5px solid #111111;
    color: #111111;
    cursor: pointer;
    transition: var(--t);
    font-size: 0.85rem;
}

.nsr:hover {
    background: #048eef;
    border-color: #048eef;
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
    background: #111111;
    border-radius: 2px;
    transition: var(--t);
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
    background: #dceef9;
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
    background: linear-gradient(to bottom, #dceef9 70%, #dceef9 100%);
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
    padding: 60px 0px 10px;
    background: linear-gradient(to bottom, #dceef9 85%, #dceef9 100%);
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

/* Navbar Search Button */
.nsr {
    background: transparent;
    border: 1.5px solid #111111;
    cursor: pointer;
}

/* Global Search Overlay */
.nso {
    position: fixed;
    inset: 0;
    background: rgba(11, 17, 32, 0.88);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 20000;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding-top: 130px;
    padding-left: 20px;
    padding-right: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, visibility 0.25s ease;
}

.nso.open {
    opacity: 1;
    visibility: visible;
}

.nso-box {
    display: flex;
    align-items: center;
    gap: 16px;
    width: 100%;
    max-width: 680px;
    background: #fff;
    border-radius: 12px;
    padding: 18px 24px;
    box-shadow: 0 24px 80px rgba(0, 0, 0, 0.45);
}

.nso-ico {
    color: var(--bl);
    font-size: 1.2rem;
    flex-shrink: 0;
}

.nso-box input {
    flex: 1;
    border: none;
    outline: none;
    font-family: var(--fb);
    font-size: 1.1rem;
    color: var(--nv);
    background: transparent;
    min-width: 0;
}

.nso-box input::placeholder {
    color: var(--g4);
}

.nso-close {
    background: var(--g1);
    border: none;
    border-radius: 50%;
    width: 34px;
    height: 34px;
    min-width: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--g6);
    font-size: 0.9rem;
    transition: var(--t);
}

.nso-close:hover {
    background: var(--nv);
    color: #fff;
}

.nso-hint {
    margin-top: 16px;
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.55);
    text-align: center;
}

.nso-hint kbd {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 4px;
    padding: 2px 6px;
    font-family: var(--fb);
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
}

.nso-results {
    width: 100%;
    max-width: 680px;
    margin-top: 8px;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
    display: none;
}

.nso-results.has-results {
    display: block;
}

.nso-result-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 20px;
    cursor: pointer;
    border-bottom: 1px solid var(--g1);
    transition: background var(--t);
}

.nso-result-item:last-child {
    border-bottom: none;
}

.nso-result-item:hover {
    background: var(--g1);
}

.nso-result-ico {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 8px;
    background: var(--bg2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--bl);
    font-size: 0.9rem;
    overflow: hidden;
}

.nso-result-ico img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.nso-result-name {
    font-family: var(--fh);
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--nv);
    flex: 1;
    min-width: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.nso-result-cat {
    font-size: 0.75rem;
    color: var(--g4);
    white-space: nowrap;
}

.nso-no-results {
    padding: 20px;
    text-align: center;
    color: var(--g4);
    font-size: 0.9rem;
}

/* Product Filter Bar */
.pfb {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 36px;
}

.pfts {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.pft {
    padding: 8px 20px;
    border: 1.5px solid var(--g2);
    border-radius: 25px;
    background: var(--w);
    font-family: var(--fh);
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--g6);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    cursor: pointer;
    transition: var(--t);
}

.pft:hover {
    border-color: var(--bl);
    color: var(--bl);
}

.pft.active {
    background: var(--bl);
    border-color: var(--bl);
    color: var(--w);
}

.pfsw {
    position: relative;
    display: flex;
    align-items: center;
}

.pfsw i {
    position: absolute;
    left: 14px;
    color: var(--g4);
    font-size: 0.85rem;
    pointer-events: none;
}

.pfsw input {
    padding: 9px 16px 9px 38px;
    border: 1.5px solid var(--g2);
    border-radius: 25px;
    font-family: var(--fb);
    font-size: 0.88rem;
    color: var(--nv);
    background: var(--w);
    width: 220px;
    outline: none;
    transition: border-color var(--t), box-shadow var(--t);
}

.pfsw input:focus {
    border-color: var(--bl);
    box-shadow: 0 0 0 3px rgba(26, 109, 212, 0.12);
}

.pfsw input::placeholder {
    color: var(--g4);
}

.pfempty {
    text-align: center;
    padding: 60px 0 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
}

.pfempty i {
    font-size: 2.5rem;
    color: var(--g2);
}

.pfempty p {
    color: var(--g4);
    font-size: 1rem;
}

@media (max-width: 600px) {
    .pfb {
        flex-direction: column;
        align-items: flex-start;
    }
    .pfsw input {
        width: 100%;
    }
    .pfsw {
        width: 100%;
    }
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
    padding: 60px 0 10px;
    background: linear-gradient(to bottom, #dceef9 70%, #eef2f7 100%);
}

.tslider {
    display: flex;
    align-items: center;
    gap: 16px;
}

.ttrack {
    overflow: hidden;
    flex: 1;
    min-width: 0;
}

.tgd {
    display: flex;
    gap: 28px;
    transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}

.tsb {
    flex-shrink: 0;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #fff;
    border: 2px solid var(--bl);
    color: var(--bl);
    font-size: 0.85rem;
    cursor: pointer;
    transition: var(--t);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.tsb:hover:not(:disabled) {
    background: var(--bl);
    color: #fff;
}

.tsb:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

.tcr {
    background: var(--w);
    border-radius: var(--r);
    padding: 36px 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: var(--t);
    display: flex;
    flex-direction: column;
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
    flex: 1;
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
    overflow: hidden;
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
    background: #dceef9;
    padding: 55px 0 0;
}

.fgd {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
    gap: 50px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(26, 109, 212, 0.18);
}

.fbd {
    display: flex;
    flex-direction: column;
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
    font-weight: 900;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.flogo i {
    color: var(--bl);
    font-size: 1.3rem;
}

.flogo-nex {
    color: #2081da;
    font-weight: 900;
}

.flogo-gen {
    color: #f96900;
    font-weight: 900;
}

.fbd > p {
    font-size: 0.88rem;
    color: #111111;
    line-height: 1.6;
    margin-bottom: 16px;
    text-align: justify;
}

.fso {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.fso a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(26, 109, 212, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a6dd4;
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
    color: #0f2d4e;
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
    color: #111111;
    transition: var(--t);
    display: flex;
    align-items: center;
    gap: 8px;
}

.fcl li a:hover {
    color: #1a6dd4;
    padding-left: 4px;
}

.fcl li a i {
    font-size: 0.6rem;
    color: var(--bl);
}

.fcn {
    gap: 16px;
}

.fcn li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.88rem;
    line-height: 1.6;
    color: #111111;
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
    color: #1a3a5c;
    border-top: 1px solid rgba(26, 109, 212, 0.18);
}

.fbt a {
    color: var(--bl);
}

.fln {
    display: flex;
    gap: 20px;
}

.fln a {
    color: #1a3a5c;
    transition: var(--t);
}

.fln a:hover {
    color: #1a6dd4;
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
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 28px;
    position: fixed;
    inset: 0;
    background: rgba(11, 17, 32, 0.97);
    z-index: 2000;
    transform: translateX(-100%);
    transition: transform 0.48s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}

.mobn.open {
    transform: translateX(0);
}

.mobn a {
    font-family: var(--fh);
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--w);
    text-transform: uppercase;
    opacity: 0;
    transform: translateX(-24px);
    transition: opacity 0.24s ease, transform 0.24s ease, color 0.2s ease;
}

.mobn a:hover {
    color: var(--or);
}

.mobn.open a {
    opacity: 1;
    transform: translateX(0);
}

.mobn.open a:nth-child(1) { transition-delay: 0.10s; }
.mobn.open a:nth-child(2) { transition-delay: 0.15s; }
.mobn.open a:nth-child(3) { transition-delay: 0.19s; }
.mobn.open a:nth-child(4) { transition-delay: 0.23s; }
.mobn.open a:nth-child(5) { transition-delay: 0.27s; }
.mobn.open a:nth-child(6) { transition-delay: 0.31s; }


/* ── Responsive Design ── */

/* 1024px — Tablet landscape */
@media (max-width: 1024px) {
    .hg {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 60px 0 50px;
        text-align: center;
    }
    .hd {
        margin-left: auto;
        margin-right: auto;
    }
    .hbt {
        justify-content: center;
    }
    .hv {
        max-width: 560px;
        margin: 0 auto;
        padding-bottom: 20px;
    }
    /* Floating badges: pull back inside bounds */
    .hfl.f1 {
        top: 10px;
        right: 0;
    }
    .hfl.f2 {
        bottom: 0;
        left: 10px;
    }
    /* Camera panel height reduced for tablet */
    .cp .scl {
        height: 130px;
    }
    .abg {
        grid-template-columns: 1fr;
        gap: 48px;
    }
    .abm {
        width: 100%;
    }
    .abf {
        grid-template-columns: repeat(2, 1fr);
    }
    .svg2 {
        grid-template-columns: repeat(2, 1fr);
    }
    .prgd {
        grid-template-columns: repeat(2, 1fr);
    }
    .wgd {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    .fgd {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
    .about,
    .svc,
    .prod,
    .testi {
        padding: 50px 0;
    }
    .why {
        padding: 48px 0;
    }
    .sh {
        margin-bottom: 44px;
    }
}

/* 768px — Tablet portrait */
@media (max-width: 768px) {
    /* Topbar — compact single row */
    .tbi {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .tbl {
        gap: 14px;
        flex-wrap: nowrap;
    }
    /* hide address (1st) and hours (3rd) — keep email only */
    .tbl span:first-child,
    .tbl span:last-child {
        display: none;
    }

    /* Navbar — flexbox so logo stays left, nr stays right */
    .ni {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
    }
    /* Logo: constrain width so middle gap stays spacious */
    .logo {
        flex-shrink: 0;
        gap: 6px;
    }
    .logo img {
        height: 68px;
        margin: -3px 0 -9px 0;
    }
    .logo-name {
        flex: none;
        font-size: 1.05rem;
    }
    .nmn {
        display: none;
    }
    .nsr {
        display: none;
    }
    .nr {
        flex-shrink: 0;
        gap: 10px;
    }
    /* Get Quote — smaller on mobile */
    .btn-nq {
        padding: 8px 18px;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    /* Hamburger: column so 3 lines stack top-to-bottom */
    .hbr {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 6px 4px;
    }

    /* Hero */
    .hg {
        grid-template-columns: 1fr;
        padding: 48px 0 40px;
        text-align: center;
        gap: 36px;
    }
    .hd {
        margin-left: auto;
        margin-right: auto;
        font-size: 0.98rem;
    }
    .hbt {
        justify-content: center;
    }
    .hv {
        max-width: 480px;
        margin: 0 auto;
        padding-bottom: 16px;
    }
    .cc {
        max-width: 460px;
        margin: 0 auto;
    }
    /* Camera panel height reduced for mobile */
    .cp .scl {
        height: 110px;
    }
    /* Floating badges repositioned to stay within the cc card */
    .hfl.f1 {
        top: -12px;
        right: 8px;
        padding: 10px 14px;
    }
    .hfl.f2 {
        bottom: 48px;
        left: 8px;
        padding: 10px 14px;
        animation-delay: 1.5s;
    }
    .fic {
        width: 34px;
        height: 34px;
        font-size: 0.85rem;
    }
    .ftx {
        font-size: 0.72rem;
    }
    .fsx {
        font-size: 0.6rem;
    }

    /* Info strip — 2×2 grid, centered */
    .igr {
        grid-template-columns: 1fr 1fr;
    }
    .iit {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        justify-content: center;
    }
    .iit:nth-child(odd) {
        border-right: 1px solid rgba(255, 255, 255, 0.15);
    }
    .iit:nth-last-child(-n+2) {
        border-bottom: none;
    }

    /* About */
    .abg {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .abm {
        width: 100%;
    }
    .abc .ssub,
    .abc .stt,
    .abc .abt {
        text-align: center;
    }
    /* 2-col grid shrunk to content width, then centered */
    .abf {
        display: grid;
        grid-template-columns: auto auto;
        width: fit-content;
        margin: 0 auto 28px;
        gap: 12px 40px;
    }
    .abg .btn-p {
        display: flex;
        width: fit-content;
        margin: 0 auto;
    }

    /* Services */
    .svg2 {
        grid-template-columns: 1fr;
    }

    /* Products */
    .prgd {
        grid-template-columns: 1fr 1fr;
    }
    .tsb {
        width: 38px;
        height: 38px;
        font-size: 0.78rem;
    }

    /* Why Choose Us */
    .wgd {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    /* Footer — all 3 columns in one row */
    .fgd {
        grid-template-columns: repeat(3, 1fr);
        gap: 28px 8px;
    }
    .fbd {
        grid-column: 1 / -1;
        text-align: center;
    }
    .fso {
        justify-content: center;
    }
    .flogo {
        justify-content: center;
    }
    .fcl {
        text-align: center;
        overflow: hidden;
    }
    .fcl h4 {
        font-size: 0.8rem;
        margin-bottom: 12px;
    }
    .fcl h4::after {
        left: 50%;
        transform: translateX(-50%);
    }
    .fcl ul {
        gap: 7px;
    }
    /* All columns — no icons, text truncates with ellipsis */
    .fcl li a,
    .fcn li {
        display: block;
        font-size: 0.68rem;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .fcl li a i,
    .fcn li i {
        display: none;
    }
    .fbt {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    /* Section spacing */
    .about,
    .svc,
    .prod,
    .testi {
        padding: 44px 0;
    }
    .why {
        padding: 42px 0;
    }
    .contact-sec {
        padding: 44px 0 20px;
    }
    .sh {
        margin-bottom: 36px;
    }
}

/* 576px — Large mobile */
@media (max-width: 576px) {
    .cn {
        padding: 0 16px;
    }

    /* Hero */
    .hg {
        padding: 36px 0 32px;
        gap: 28px;
    }
    .htl {
        font-size: clamp(1.75rem, 7vw, 2.2rem);
    }
    .hd {
        font-size: 0.92rem;
        margin-bottom: 28px;
    }
    .hsub {
        font-size: 0.78rem;
        letter-spacing: 3px;
    }
    /* Camera grid — scaled down for small mobile */
    .hv {
        max-width: 100%;
        padding-bottom: 30px;
    }
    .cc {
        max-width: 100%;
        padding: 12px;
    }
    .cg {
        gap: 5px;
    }
    .cp .scl {
        height: 75px;
    }
    .cp .cml {
        font-size: 0.5rem;
    }
    .cmb {
        margin-top: 8px;
        padding-top: 8px;
    }
    .cms,
    .cmt {
        font-size: 0.62rem;
    }
    /* Floating badges — compact and repositioned */
    .hfl {
        padding: 8px 12px;
        gap: 8px;
        border-radius: 10px;
    }
    .hfl.f1 {
        top: -10px;
        right: 4px;
    }
    .hfl.f2 {
        bottom: 30px;
        left: 4px;
        animation-delay: 1.5s;
    }
    .fic {
        width: 30px;
        height: 30px;
        font-size: 0.78rem;
    }
    .ftx {
        font-size: 0.68rem;
    }
    .fsx {
        font-size: 0.56rem;
    }

    /* Info strip — single column */
    .igr {
        grid-template-columns: 1fr;
    }
    .iit {
        border-right: none !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    }
    .iit:last-child {
        border-bottom: none;
    }

    /* Products */
    .prgd {
        grid-template-columns: 1fr 1fr;
    }

    /* Why Choose Us */
    .wgd {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    .wcr h3 {
        font-size: 2rem;
    }
    .wic {
        width: 64px;
        height: 64px;
        font-size: 1.3rem;
    }

    /* Testimonials arrows */
    .tsb {
        width: 34px;
        height: 34px;
        font-size: 0.7rem;
    }

    /* Footer */
    .fcl li a {
        font-size: 0.74rem;
    }
    .fcn li {
        font-size: 0.74rem;
    }

    /* Section spacing */
    .about,
    .svc,
    .prod,
    .testi {
        padding: 36px 0;
    }
    .why {
        padding: 36px 0;
    }
    .contact-sec {
        padding: 36px 0 16px;
    }
    .sh {
        margin-bottom: 28px;
    }
}

/* 480px — Small mobile */
@media (max-width: 480px) {
    /* Navbar compact */
    .ni {
        height: 56px;
    }
    .logo img {
        height: 60px;
        margin: -3px 0 -8px 0;
    }
    .logo-name {
        font-size: 0.95rem;
    }
    .btn-nq {
        padding: 8px 14px;
        font-size: 0.78rem;
        letter-spacing: 0.5px;
    }

    /* Hero buttons */
    .hbt {
        flex-direction: column;
        gap: 12px;
    }
    .hbt .btn {
        width: 100%;
        justify-content: center;
    }
    /* Camera grid — very compact on tiny screens */
    .cc {
        padding: 10px;
    }
    .cp .scl {
        height: 62px;
    }
    .cg {
        gap: 4px;
    }
    /* Floating badges hidden at 480px — too cramped to position cleanly */
    .hfl {
        display: none;
    }

    /* Info strip */
    .igr {
        grid-template-columns: 1fr;
    }

    /* Products — single column */
    .prgd {
        grid-template-columns: 1fr;
    }

    /* Why Choose Us — single column */
    .wgd {
        grid-template-columns: 1fr;
    }

    /* Testimonials — hide arrows, full-width card */
    .tsb {
        display: none;
    }
    .tgd {
        gap: 16px;
    }

    /* About stats — keep 2 cols (3×2) at all mobile sizes */
    .abf {
        grid-template-columns: auto auto;
        width: fit-content;
        margin: 0 auto 29px;
    }

    /* Section spacing */
    .about,
    .svc,
    .prod,
    .testi {
        padding: 30px 0;
    }
    .why {
        padding: 30px 0;
    }
    .contact-sec {
        padding: 30px 0 12px;
    }
    .sh {
        margin-bottom: 24px;
    }
}

/* ── Contact Section ── */
.contact-sec {
    padding: 60px 0 30px;
    background: linear-gradient(to bottom, #eef2f7 0%, #eef2f7 75%, #dceef9 100%);
}

.ctc-grid {
    display: flex;
    gap: 48px;
}

.ctc-form-wrap {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    background: var(--w);
    border-radius: var(--r);
    padding: 40px;
}

.ctc-success {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f0fdf4;
    border: 1px solid #86efac;
    color: #166534;
    border-radius: var(--r);
    padding: 14px 18px;
    font-size: 0.9rem;
    margin-bottom: 24px;
}

.ctc-success i {
    font-size: 1.1rem;
    color: #22c55e;
    flex-shrink: 0;
}

.ctc-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
}

.ctc-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.ctc-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.ctc-field label {
    font-family: var(--fh);
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--nv);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ctc-field label span {
    color: var(--or);
}

.ctc-field input,
.ctc-field textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid var(--g2);
    border-radius: var(--r);
    font-family: var(--fb);
    font-size: 0.9rem;
    color: var(--nv);
    background: var(--g1);
    transition: border-color var(--t), box-shadow var(--t);
    outline: none;
}

.ctc-field input:focus,
.ctc-field textarea:focus {
    border-color: var(--bl);
    background: var(--w);
    box-shadow: 0 0 0 3px rgba(26, 109, 212, 0.1);
}

.ctc-field input::placeholder,
.ctc-field textarea::placeholder {
    color: var(--g4);
}

.ctc-field textarea {
    resize: vertical;
    min-height: 130px;
}

.ctc-err {
    font-size: 0.78rem;
    color: #ef4444;
}

.ctc-btn {
    align-self: flex-start;
}

/* Info Column */
.ctc-info {
    width: 420px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #227fd6;
    border-radius: var(--r);
    padding: 40px 36px;
    color: var(--w);
    gap: 28px;
}

.ctc-info h3 {
    font-family: var(--fh);
    font-size: 1.5rem;
    font-weight: 800;
    color: #fff;
    margin: 0;
}

.ctc-sub {
    font-size: 0.88rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.7;
    margin: -16px 0 0;
}

.ctc-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.ctc-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.ctc-ico {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 0.95rem;
    flex-shrink: 0;
}

.ctc-item strong {
    display: block;
    font-family: var(--fh);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.65);
    margin-bottom: 3px;
}

.ctc-item a,
.ctc-item span {
    font-size: 0.9rem;
    color: #fff;
    transition: color var(--t);
}

.ctc-item a:hover {
    color: rgba(255, 255, 255, 0.75);
}

.ctc-social {
    display: flex;
    gap: 12px;
    padding-top: 8px;
    border-top: 1px solid rgba(255, 255, 255, 0.25);
}

.ctc-social a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 0.85rem;
    transition: var(--t);
}

.ctc-social a:hover {
    background: rgba(255, 255, 255, 0.3);
    color: #fff;
}

@media (max-width: 900px) {
    .ctc-grid {
        flex-direction: column;
    }
    .ctc-info {
        width: 100%;
        order: -1;
    }
}

@media (max-width: 600px) {
    .ctc-row {
        grid-template-columns: 1fr;
    }
    .ctc-form-wrap {
        padding: 28px 20px;
    }
    .ctc-info {
        padding: 28px 20px;
    }
}

/* ── Product Quick View Modal ── */
.pm-overlay {
    position: fixed;
    inset: 0;
    background: rgba(11, 17, 32, 0.78);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9000;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, visibility 0.25s ease;
    backdrop-filter: blur(4px);
}

.pm-overlay.open {
    opacity: 1;
    visibility: visible;
}

.pm-box {
    background: #fff;
    border-radius: var(--r);
    max-width: 860px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 24px 80px rgba(0, 0, 0, 0.35);
    transform: translateY(20px);
    transition: transform 0.25s ease;
}

.pm-overlay.open .pm-box {
    transform: translateY(0);
}

.pm-close {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 34px;
    height: 34px;
    border: none;
    background: var(--g1);
    border-radius: 50%;
    font-size: 1.25rem;
    line-height: 1;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
    color: var(--nv);
    transition: var(--t);
}

.pm-close:hover {
    background: var(--nv);
    color: #fff;
}

.pm-body {
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.pm-img-wrap {
    background: var(--g1);
    border-radius: var(--r) 0 0 var(--r);
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 380px;
    position: relative;
    overflow: hidden;
}

.pm-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pm-info {
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.pm-cat {
    font-family: var(--fh);
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    color: var(--or);
}

.pm-info h2 {
    font-family: var(--fh);
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--nv);
    line-height: 1.25;
    margin: 0;
}

.pm-price-row {
    display: flex;
    align-items: baseline;
    gap: 12px;
}

.pm-price {
    font-family: var(--fh);
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--bl);
}

.pm-old-price {
    font-size: 1rem;
    color: var(--g4);
    text-decoration: line-through;
}

.pm-desc {
    color: var(--g6);
    font-size: 0.88rem;
    line-height: 1.75;
    margin: 0;
}

.pm-features {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.pm-features .pf-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 0.84rem;
    color: #444;
}

.pm-features .pf-item i {
    color: var(--bl);
    margin-top: 3px;
    flex-shrink: 0;
    font-size: 0.75rem;
}

.pm-meta {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    padding-top: 4px;
    border-top: 1px solid var(--g2);
}

.pm-meta-item {
    font-size: 0.8rem;
    color: var(--g6);
}

.pm-meta-item strong {
    color: var(--nv);
}

.pm-cta {
    align-self: flex-start;
    margin-top: 4px;
}

@media (max-width: 640px) {
    .pm-body {
        grid-template-columns: 1fr;
    }
    .pm-img-wrap {
        min-height: 240px;
        border-radius: var(--r) var(--r) 0 0;
    }
    .pm-info {
        padding: 24px 20px;
    }
}
</style>
