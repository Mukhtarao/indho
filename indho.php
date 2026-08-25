<?php
/* ------------------------------------------------------------------
   Munes Oil, Fuel & Supermarket — business listing page
   Data lives in plain PHP arrays below so the page is easy to update
   without touching markup.
------------------------------------------------------------------- */

$business = [
    'name'        => 'Munes Oil, Fuel & Supermarket',
    'category'    => 'Oil, Fuel & Supermarket',
    'city'        => 'Hargeisa',
    'country'     => 'Somalia',
    'address'     => 'Hargeisa, Hargeisa, Somalia',
    'phone'       => '+252 XX XXX XXXX',
    'description' => 'A fuel stop and full grocery run in one place. Munes keeps the pumps and the shelves open around the clock, so a top‑up, a bag of groceries, or a bottle of oil is never far away.',
];

$services = [
    ['icon' => 'fuel',   'label' => 'Fuel',        'note' => 'Petrol & diesel, all pumps open'],
    ['icon' => 'drum',   'label' => 'Oil',         'note' => 'Engine & industrial oil'],
    ['icon' => 'cart',   'label' => 'Supermarket', 'note' => 'Groceries & daily essentials'],
    ['icon' => 'park',   'label' => 'Parking',     'note' => 'Free on-site parking'],
];

$hours = [
    ['day' => 'Monday – Friday', 'time' => '24 Hours'],
    ['day' => 'Saturday',        'time' => '24 Hours'],
    ['day' => 'Sunday',          'time' => '24 Hours'],
];

/* Simple inline icon set — keeps the page dependency-free */
function icon($name) {
    $icons = [
        'fuel'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v16"/><path d="M3 10h10"/><path d="M14 8l3.5 3.5c.5.5.5 1 .5 1.5V18a1.5 1.5 0 0 0 3 0v-5"/><path d="M18 6l1.5 1.5"/><path d="M2 22h13"/></svg>',
        'drum'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="1.5"/><path d="M5 9h14"/><path d="M5 15h14"/><path d="M9 3v18"/><path d="M15 3v18"/></svg>',
        'cart'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="20" r="1.3"/><circle cx="18" cy="20" r="1.3"/><path d="M2.5 3h2l2.6 12.3a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21 7H6"/></svg>',
        'park'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 16V8h4a2.5 2.5 0 0 1 0 5H9"/></svg>',
        'pin'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.7"/></svg>',
        'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L14 13l5 2v4a2 2 0 0 1-2.2 2A16 16 0 0 1 2 4.2 2 2 0 0 1 4 4Z"/></svg>',
        'tag'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12.6 12.6 20 3 10.4V3h7.4L20 12.6Z"/><circle cx="7.3" cy="7.3" r="1.3"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>',
    ];
    return $icons[$name] ?? '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($business['name']) ?> — <?= htmlspecialchars($business['city']) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:#181510;
    --ink-soft:#3a352c;
    --sand:#f4ecda;
    --paper:#fffdf8;
    --green:#2f6b4c;
    --green-dark:#234f38;
    --amber:#e0862d;
    --amber-dark:#b96a1d;
    --line:#e7ddc4;
    --muted:#7c7461;
  }
  *{margin:0;padding:0;box-sizing:border-box;}
  body{
    font-family:'Inter',Arial,sans-serif;
    color:var(--ink-soft);
    background:var(--paper);
  }
  h1,h2,h3,.brand{font-family:'Oswald',Arial,sans-serif;}

  /* hazard stripe divider — the signature element */
  .stripe{
    height:9px;
    background:repeating-linear-gradient(-45deg,var(--amber) 0 14px,var(--ink) 14px 28px);
  }

  /* NAVBAR */
  .navbar{
    background:var(--ink);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:18px 44px;
    flex-wrap:wrap;
  }
  .brand{
    font-weight:700;
    font-size:24px;
    letter-spacing:1px;
    color:var(--paper);
  }
  .brand span{color:var(--amber);}
  .nav-links{display:flex;gap:34px;list-style:none;}
  .nav-links li a{
    color:#d8d2c2;
    text-decoration:none;
    font-weight:500;
    font-size:13px;
    letter-spacing:1.2px;
    text-transform:uppercase;
    display:flex;align-items:center;gap:6px;
  }
  .nav-links li a:hover{color:var(--amber);}
  .nav-links svg{width:15px;height:15px;}

  /* HERO */
  .hero{
    position:relative;
    min-height:380px;
    background:
      linear-gradient(100deg, rgba(15,13,10,0.92) 5%, rgba(15,13,10,0.62) 50%, rgba(15,13,10,0.25) 100%),
      url('https://images.unsplash.com/photo-1541348263662-e068662d82af?q=80&w=1600&auto=format&fit=crop')
      center/cover no-repeat;
    display:flex;
    flex-direction:column;
    justify-content:center;
    padding:0 44px;
    color:var(--paper);
  }
  .eyebrow{
    color:var(--amber);
    font-size:13px;
    letter-spacing:3px;
    text-transform:uppercase;
    font-weight:600;
    margin-bottom:14px;
  }
  .hero h1{
    font-size:46px;
    font-weight:700;
    letter-spacing:0.5px;
    text-transform:uppercase;
    line-height:1.1;
    max-width:720px;
    margin-bottom:18px;
  }
  .breadcrumb{font-size:14px;color:#d8d2c2;}
  .breadcrumb a{color:#d8d2c2;text-decoration:none;font-weight:500;}
  .breadcrumb a:hover{color:var(--amber);}
  .breadcrumb .sep{margin:0 8px;color:#8a8270;}
  .breadcrumb .current{color:var(--amber);font-weight:600;}

  /* QUICK FACTS STRIP */
  .facts{
    background:var(--green);
    display:flex;
    flex-wrap:wrap;
  }
  .fact{
    flex:1 1 200px;
    display:flex;
    align-items:center;
    gap:12px;
    padding:20px 28px;
    color:var(--paper);
    border-right:1px solid rgba(255,255,255,0.14);
  }
  .fact:last-child{border-right:none;}
  .fact svg{width:26px;height:26px;flex-shrink:0;color:var(--amber);}
  .fact-label{font-weight:600;font-size:14.5px;text-transform:uppercase;letter-spacing:0.5px;}
  .fact-note{font-size:12.5px;color:#dfeee4;margin-top:2px;}

  /* CONTENT */
  .content{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    padding:44px;
    gap:36px;
    flex-wrap:wrap;
    background:var(--sand);
  }
  .description{
    color:var(--ink-soft);
    font-size:17px;
    line-height:1.75;
    max-width:820px;
  }
  .description strong{color:var(--ink);}
  .thumb{
    width:180px;
    height:140px;
    border-radius:3px;
    overflow:hidden;
    flex-shrink:0;
    box-shadow:0 6px 18px rgba(24,21,16,0.2);
    border:3px solid var(--paper);
  }
  .thumb img{width:100%;height:100%;object-fit:cover;display:block;}

  /* INFO SECTION */
  .info-section{
    padding:0 44px 60px;
    display:grid;
    grid-template-columns:1.4fr 1fr;
    gap:28px;
    background:var(--sand);
  }
  .info-block{
    background:var(--paper);
    border:1px solid var(--line);
    border-radius:4px;
    padding:26px 28px;
    margin-bottom:24px;
  }
  .info-block h3{
    font-size:15px;
    letter-spacing:1.5px;
    text-transform:uppercase;
    margin-bottom:18px;
    color:var(--ink);
    display:flex;
    align-items:center;
    gap:8px;
  }
  .info-block h3::before{
    content:"";
    width:14px;height:14px;
    background:var(--amber);
    display:inline-block;
    clip-path:polygon(50% 0,100% 100%,0 100%);
  }
  .info-row{
    display:flex;
    gap:12px;
    align-items:flex-start;
    margin-bottom:14px;
    font-size:15px;
    color:var(--ink-soft);
  }
  .info-row:last-of-type{margin-bottom:0;}
  .info-row svg{width:18px;height:18px;color:var(--green);flex-shrink:0;margin-top:2px;}
  .info-row .label{color:var(--muted);font-size:12.5px;text-transform:uppercase;letter-spacing:0.5px;display:block;}

  .service-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
  .service{
    display:flex;
    gap:12px;
    align-items:flex-start;
    padding:14px;
    background:var(--sand);
    border-radius:4px;
  }
  .service svg{width:22px;height:22px;color:var(--amber-dark);flex-shrink:0;}
  .service .s-label{font-weight:600;color:var(--ink);font-size:14.5px;}
  .service .s-note{font-size:12.5px;color:var(--muted);margin-top:2px;}

  .hours-row{
    display:flex;
    justify-content:space-between;
    font-size:14.5px;
    padding:10px 0;
    border-bottom:1px dashed var(--line);
    color:var(--ink-soft);
  }
  .hours-row:last-child{border-bottom:none;}
  .hours-row .time{color:var(--green);font-weight:600;}

  .badge-247{
    display:flex;
    align-items:center;
    gap:14px;
    background:var(--ink);
    color:var(--paper);
    border-radius:4px;
    padding:16px 18px;
    margin-top:18px;
  }
  .badge-247 .num{font-family:'Oswald',sans-serif;font-size:26px;font-weight:700;color:var(--amber);}
  .badge-247 .txt{font-size:12.5px;color:#d8d2c2;line-height:1.4;}

  .map-placeholder{
    background:var(--sand);
    border:1px dashed var(--line);
    height:200px;
    border-radius:4px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    color:var(--muted);
    font-size:13.5px;
    gap:8px;
  }
  .map-placeholder svg{width:26px;height:26px;color:var(--green);}

  .btn-primary{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:var(--amber);
    color:var(--ink);
    padding:12px 24px;
    border-radius:3px;
    text-decoration:none;
    font-weight:600;
    font-size:13.5px;
    letter-spacing:0.5px;
    text-transform:uppercase;
    margin-top:16px;
  }
  .btn-primary:hover{background:var(--amber-dark);color:var(--paper);}
  .btn-primary svg{width:16px;height:16px;}

  footer{
    background:var(--ink);
    color:#a89f8b;
    text-align:center;
    padding:22px;
    font-size:13px;
  }
  footer span{color:var(--amber);}

  @media(max-width:820px){
    .info-section{grid-template-columns:1fr;}
    .navbar{padding:16px 20px;}
    .nav-links{gap:16px;flex-wrap:wrap;}
    .hero{padding:0 20px;}
    .hero h1{font-size:30px;}
    .content{padding:28px 20px;}
    .info-section{padding:0 20px 40px;}
    .service-grid{grid-template-columns:1fr;}
  }
</style>
</head>
<body>

  <nav class="navbar">
    <div class="brand">AUTO<span>YAS</span></div>
    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="#"><?= icon('pin') ?> Cities</a></li>
      <li><a href="#">🌐 Countries</a></li>
      <li><a href="#">Login</a></li>
    </ul>
  </nav>
  <div class="stripe"></div>

  <header class="hero">
    <div class="eyebrow"><?= htmlspecialchars($business['city']) ?>, <?= htmlspecialchars($business['country']) ?></div>
    <h1><?= htmlspecialchars($business['name']) ?></h1>
    <div class="breadcrumb">
      <a href="#">Home</a>
      <span class="sep">›</span>
      <a href="#"><?= htmlspecialchars($business['country']) ?></a>
      <span class="sep">›</span>
      <a href="#"><?= htmlspecialchars($business['city']) ?></a>
      <span class="sep">›</span>
      <span class="current"><?= htmlspecialchars($business['name']) ?></span>
    </div>
  </header>

  <section class="facts">
    <?php foreach ($services as $s): ?>
      <div class="fact">
        <?= icon($s['icon']) ?>
        <div>
          <div class="fact-label"><?= htmlspecialchars($s['label']) ?></div>
          <div class="fact-note"><?= htmlspecialchars($s['note']) ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

  <section class="content">
    <p class="description">
      <?= htmlspecialchars($business['description']) ?>
      Find <strong><?= htmlspecialchars($business['name']) ?></strong> contact details, opening hours,
      services and directions right here — a <strong><?= htmlspecialchars($business['category']) ?></strong>
      business in <?= htmlspecialchars($business['city']) ?>, <?= htmlspecialchars($business['country']) ?>.
    </p>
    <div class="thumb">
      <img src="https://images.unsplash.com/photo-1545262810-77515befe149?q=80&w=400&auto=format&fit=crop" alt="<?= htmlspecialchars($business['name']) ?> storefront at night">
    </div>
  </section>

  <section class="info-section">
    <div>
      <div class="info-block">
        <h3>Contact Information</h3>
        <div class="info-row">
          <?= icon('pin') ?>
          <div><span class="label">Address</span><?= htmlspecialchars($business['address']) ?></div>
        </div>
        <div class="info-row">
          <?= icon('phone') ?>
          <div><span class="label">Phone</span><?= htmlspecialchars($business['phone']) ?></div>
        </div>
        <div class="info-row">
          <?= icon('tag') ?>
          <div><span class="label">Category</span><?= htmlspecialchars($business['category']) ?></div>
        </div>
        <a class="btn-primary" href="tel:<?= htmlspecialchars($business['phone']) ?>"><?= icon('phone') ?> Contact Now</a>
      </div>

      <div class="info-block">
        <h3>Services</h3>
        <div class="service-grid">
          <?php foreach ($services as $s): ?>
            <div class="service">
              <?= icon($s['icon']) ?>
              <div>
                <div class="s-label"><?= htmlspecialchars($s['label']) ?></div>
                <div class="s-note"><?= htmlspecialchars($s['note']) ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div>
      <div class="info-block">
        <h3>Opening Hours</h3>
        <?php foreach ($hours as $h): ?>
          <div class="hours-row">
            <span><?= htmlspecialchars($h['day']) ?></span>
            <span class="time"><?= htmlspecialchars($h['time']) ?></span>
          </div>
        <?php endforeach; ?>
        <div class="badge-247">
          <div class="num">24/7</div>
          <div class="txt">Pumps, oil counter and supermarket aisles never close.</div>
        </div>
      </div>

      <div class="info-block">
        <h3>Location</h3>
        <div class="map-placeholder">
          <?= icon('pin') ?>
          Map goes here
        </div>
      </div>
    </div>
  </section>

  <footer>
    Listed on <span>AUTOYAS</span> — <?= htmlspecialchars($business['city']) ?>, <?= htmlspecialchars($business['country']) ?> · &copy; <?= date('Y') ?>
  </footer>

</body>
</html>
