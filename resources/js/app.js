// resources/js/app.js
import './bootstrap';
import '../css/app.css';

document.addEventListener('DOMContentLoaded', () => {
   // ========== PAGE TRANSITION: FADE-IN SAAT HALAMAN LOAD ==========
  const page = document.getElementById('page-transition');
  if (page) {
    // pakai requestAnimationFrame biar nunggu reflow dulu
    requestAnimationFrame(() => {
      page.classList.add('page-transition-active');
    });
  }
    // ========== PAGE TRANSITION: FADE-OUT SEBELUM PINDAH HALAMAN ==========
  if (page) {
    const internalLinks = Array.from(document.querySelectorAll('a[href]'));

    internalLinks.forEach((link) => {
      const href = link.getAttribute('href');

      // skip:
      // - anchor (#something)
      // - javascript:...
      if (!href || href.startsWith('#') || href.startsWith('javascript:')) return;

      // skip link eksternal (domain beda)
      const url = new URL(link.href, window.location.href);
      if (url.origin !== window.location.origin) return;

      // skip link yang buka tab baru
      if (link.target === '_blank') return;

      // bisa juga kasih data-no-transition utk nge-skip manual
      if (link.hasAttribute('data-no-transition')) return;

      link.addEventListener('click', (e) => {
        // biar nggak double ketika user spam click
        if (page.classList.contains('page-transition-leave')) return;

        e.preventDefault();

        // ganti kelas: keluar
        page.classList.remove('page-transition-active');
        page.classList.add('page-transition-leave');

        // delay sedikit sesuai durasi CSS (350ms)
        setTimeout(() => {
          window.location.href = link.href;
        }, 300);
      });
    });
  }


  // ========== NAVBAR: HAMBURGER ==========
  const btn = document.getElementById('navToggle');
  const menu = document.getElementById('navMenu');
  if (btn && menu) {
    btn.addEventListener('click', () => {
      const isOpen = !menu.classList.toggle('hidden');
      btn.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ========== DROPDOWN GENERIK (data-dd-btn / data-dd-panel) ==========
  document.querySelectorAll('[data-dd-btn]').forEach((trigger) => {
    const panelId = trigger.getAttribute('data-dd-btn');
    const panel = panelId ? document.getElementById(panelId) : null;
    if (!panel) return;

    const closeAll = () => {
      document
        .querySelectorAll('[data-dd-panel]')
        .forEach((p) => p.classList.add('hidden'));
    };

    trigger.addEventListener('click', (e) => {
      e.stopPropagation();
      const wasOpen = !panel.classList.contains('hidden');
      closeAll();
      panel.classList.toggle('hidden', wasOpen);
    });

    window.addEventListener('click', closeAll);
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeAll();
    });
  });

  // ========== SMOOTH SCROLL UNTUK [data-scroll-to] ==========
  document.querySelectorAll('[data-scroll-to]').forEach((el) => {
    el.addEventListener('click', (e) => {
      const target = el.getAttribute('data-scroll-to');
      if (!target) return; // kalau kosong, biarkan default (href biasa)
      e.preventDefault();
      const node = document.getElementById(target);
      if (node) node.scrollIntoView({ behavior: 'smooth' });
    });
  });

  // ========== NAVBAR SCROLL EFFECT (shadow + blur) ==========
  const navbar = document.getElementById('navbar');
  const onScroll = () => {
    if (!navbar) return;
    if (window.scrollY > 50) {
      navbar.classList.add('bg-white/95', 'backdrop-blur', 'shadow-lg');
    } else {
      navbar.classList.remove('bg-white/95', 'backdrop-blur', 'shadow-lg');
    }
  };
  window.addEventListener('scroll', onScroll);

  // ========== ANIMASI MASUK (IntersectionObserver) ==========
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in-up');
          entry.target.classList.remove('opacity-0', 'translate-y-8');
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -100px 0px' }
  );

  document.querySelectorAll('[data-animate]').forEach((node) => {
    node.classList.add(
      'opacity-0',
      'translate-y-8',
      'transition-all',
      'duration-700'
    );
    observer.observe(node);
  });

  // ========== VIDEO MODAL "TENTANG KAMI" ==========
  const openVideoBtns = document.querySelectorAll('[data-open-video]');
  const videoModal = document.getElementById('video-modal');
  const videoIframe = document.getElementById('video-iframe');
  const closeVideoBtns = document.querySelectorAll('[data-close-video]');

  // URL embed YouTube (dari link kamu) + autoplay
  const YT_URL =
    'https://www.youtube.com/embed/5vQ_ttPd4gQ?si=S1MZuZSSszxCNlTQ&autoplay=1&rel=0';

  const openVideoModal = () => {
    if (!videoModal || !videoIframe) return;
    videoModal.classList.remove('hidden');
    videoModal.classList.add('flex');
    videoIframe.src = YT_URL;
  };

  const closeVideoModal = () => {
    if (!videoModal || !videoIframe) return;
    videoModal.classList.add('hidden');
    videoModal.classList.remove('flex');
    videoIframe.src = ''; // stop video
  };

  openVideoBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openVideoModal();
    });
  });

  closeVideoBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      closeVideoModal();
    });
  });

  if (videoModal) {
    videoModal.addEventListener('click', (e) => {
      // klik di backdrop
      if (e.target === videoModal) closeVideoModal();
    });
  }

   // ========== PROMO CAROUSEL ==========
  const track = document.getElementById('promo-carousel');
  const slides = track ? Array.from(track.querySelectorAll('[data-promo-slide]')) : [];
  const indicators = Array.from(document.querySelectorAll('[data-indicator]'));
  const prevBtn = document.getElementById('prev-slide');
  const nextBtn = document.getElementById('next-slide');

  let current = 0;
  const total = slides.length;

  const updateDots = () => {
    indicators.forEach((dot, i) => {
      if (i === current) {
        dot.classList.add('w-8', 'bg-[#dd2a2a]');
        dot.classList.remove('w-3', 'bg-[#b2b2b2]');
      } else {
        dot.classList.remove('w-8', 'bg-[#dd2a2a]');
        dot.classList.add('w-3', 'bg-[#b2b2b2]');
      }
    });
  };

  const applySlide = () => {
    if (!track || total === 0) return;
    // aktifkan animasi saat pindah slide normal
    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform  = `translateX(-${current * 100}%)`;
    updateDots();
  };

  const goTo = (idx) => {
    if (total === 0) return;
    current = (idx + total) % total; // <-- loop tak terbatas
    applySlide();
  };

  // tombol prev/next (kalau ada di HTML)
  prevBtn?.addEventListener('click', () => goTo(current - 1));
  nextBtn?.addEventListener('click', () => goTo(current + 1));

  // klik dot
  indicators.forEach((dot, i) => {
    dot.addEventListener('click', () => goTo(i));
  });

  // ====== DRAG / SWIPE SUPPORT ======
  let isDragging = false;
  let startX = 0;

  const getClientX = (e) =>
    e.touches ? e.touches[0].clientX : e.clientX;

  const onDragStart = (e) => {
    if (!track || total === 0) return;
    isDragging = true;
    startX = getClientX(e);
    // matikan animasi supaya gerakan drag halus
    track.style.transition = 'none';
    stopAuto();
  };

  const onDragMove = (e) => {
    if (!isDragging || !track) return;
    const currentX = getClientX(e);
    const delta = currentX - startX;
    const slideWidth = track.clientWidth; // 100% lebar card
    const base = -current * slideWidth;
    track.style.transform = `translateX(${base + delta}px)`;
  };

  const onDragEnd = (e) => {
    if (!isDragging || !track) return;
    isDragging = false;
    const endX = e.changedTouches
      ? e.changedTouches[0].clientX
      : e.clientX;
    const delta = endX - startX;
    const threshold = (track.clientWidth || 1) * 0.15; // 15% lebar card

    if (delta > threshold) {
      // geser ke kanan → slide sebelumnya
      goTo(current - 1);
    } else if (delta < -threshold) {
      // geser ke kiri → slide berikutnya
      goTo(current + 1);
    } else {
      // balik ke posisi semula
      applySlide();
    }
    startAuto();
  };

  if (track) {
    // mouse
    track.addEventListener('mousedown', onDragStart);
    window.addEventListener('mousemove', onDragMove);
    window.addEventListener('mouseup', onDragEnd);

    // touch
    track.addEventListener('touchstart', onDragStart, { passive: true });
    window.addEventListener('touchmove', onDragMove, { passive: true });
    window.addEventListener('touchend', onDragEnd);
  }

  // auto slide
  let timer = null;
  const startAuto = () => {
    if (total === 0) return;
    timer = setInterval(() => goTo(current + 1), 5000);
  };
  const stopAuto = () => {
    if (timer) clearInterval(timer);
  };

  // inisialisasi posisi awal
  applySlide();
  startAuto();
  animationdelay;


  // ========== CLEANUP SAAT LEAVE PAGE ==========
  window.addEventListener('beforeunload', () => {
    window.removeEventListener('scroll', onScroll);
  });
});
