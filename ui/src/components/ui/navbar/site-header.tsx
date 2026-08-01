import React, {
  useCallback,
  useEffect,
  useLayoutEffect,
  useRef,
  useState,
} from 'react';
import { createPortal } from 'react-dom';
import { LiquidMetalButton } from '@/components/ui/liquid-metal-button';
import { cn } from '@/lib/utils';

/* ------------------------------------------------------------------ types */

export type SiteNavChild = {
  label: string;
  href: string;
  description?: string;
};

export type SiteNavItem = {
  label: string;
  href: string;
  /** Presence of children turns this item into a dropdown trigger. */
  children?: SiteNavChild[];
};

export type SiteHeaderProps = {
  items?: SiteNavItem[];
  brand?: React.ReactNode;
  phone?: string;
  ctaLabel?: string;
  ctaHref?: string;
  /** Index of the item to mark as the current page. */
  activeIndex?: number;
  showThemeToggle?: boolean;
  className?: string;
};

/* --------------------------------------------------------------- defaults */

const defaultItems: SiteNavItem[] = [
  { label: 'Home', href: '#home-so-far' },
  { label: 'About Us', href: '#about-page' },
  {
    label: 'Projects',
    href: '#',
    children: [
      { label: 'Residential', href: '#', description: 'Apartments, floors, plots & villas' },
      { label: 'Commercial', href: '#', description: 'Offices, retail & investment space' },
    ],
  },
  { label: 'Maps', href: '#maps-page' },
  {
    label: 'More',
    href: '#',
    children: [
      { label: 'Documents', href: '#', description: 'Forms, approvals & downloads' },
      { label: 'Developers', href: '#', description: 'Builders we work with' },
      { label: 'Sell Your Property', href: '#', description: 'List with us in minutes' },
      { label: 'FAQs', href: '#', description: 'Common questions, answered' },
    ],
  },
  { label: 'Contact Us', href: '#contact-page' },
];

/* The real mark from the live site. The bar is navy in both themes now, so the
   white wordmark is the correct variant throughout — the dark-on-light version
   would disappear against it. */
const DefaultBrand = () => (
  <a href="#home-so-far" className="flex shrink-0 items-center" aria-label="Deep Real Estate — home">
    <img src="/img/logo/deep-logo-light.png" alt="Deep Real Estate" className="h-9 w-auto" />
  </a>
);

/* ----------------------------------------------------------- theme toggle */

const ThemeToggle = () => {
  const [isDark, setIsDark] = useState(
    () => typeof document !== 'undefined' && document.documentElement.classList.contains('dark'),
  );

  const toggle = () => {
    const next = !isDark;
    document.documentElement.classList.toggle('dark', next);
    try {
      localStorage.setItem('theme', next ? 'dark' : 'light');
    } catch {
      /* storage unavailable — not fatal */
    }
    setIsDark(next);
  };

  return (
    <button
      type="button"
      onClick={toggle}
      aria-label={isDark ? 'Switch to light mode' : 'Switch to dark mode'}
      className="grid h-9 w-9 shrink-0 cursor-pointer place-items-center rounded-full border border-white/20 text-white/70 transition-colors hover:bg-white/10 hover:text-white"
    >
      {isDark ? (
        <svg viewBox="0 0 24 24" className="h-[18px] w-[18px]" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
          <circle cx="12" cy="12" r="4" />
          <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
        </svg>
      ) : (
        <svg viewBox="0 0 24 24" className="h-[18px] w-[18px]" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9z" />
        </svg>
      )}
    </button>
  );
};

const ChevronDown = ({ className }: { className?: string }) => (
  <svg viewBox="0 0 24 24" className={className} fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
    <path d="m6 9 6 6 6-6" />
  </svg>
);

/* --------------------------------------------------------------- component */

/**
 * Full-width sticky site header for a property site.
 * The "limelight" indicator slides *and resizes* to match each text label,
 * follows the hovered item, and settles back on the active page.
 */
export const SiteHeader = ({
  items = defaultItems,
  brand,
  phone = '0124-4356789',
  ctaLabel = 'Sell Your Property',
  ctaHref = '#',
  activeIndex = 0,
  showThemeToggle = true,
  className,
}: SiteHeaderProps) => {
  const [hoverIndex, setHoverIndex] = useState<number | null>(null);
  const [openIndex, setOpenIndex] = useState<number | null>(null);
  const [mobileOpen, setMobileOpen] = useState(false);
  const [indicator, setIndicator] = useState({ left: 0, width: 0 });
  const [isReady, setIsReady] = useState(false);

  const navRef = useRef<HTMLElement | null>(null);
  const itemRefs = useRef<(HTMLDivElement | null)[]>([]);
  const closeTimer = useRef<number | null>(null);

  const spotlightIndex = hoverIndex ?? activeIndex;

  /* Position the limelight under the spotlit item. */
  const measure = useCallback(() => {
    const target = itemRefs.current[spotlightIndex];
    if (!target) return;
    setIndicator({ left: target.offsetLeft, width: target.offsetWidth });
  }, [spotlightIndex]);

  useLayoutEffect(() => {
    measure();
    if (!isReady) {
      const t = window.setTimeout(() => setIsReady(true), 60);
      return () => window.clearTimeout(t);
    }
  }, [measure, isReady]);

  /* Re-measure when the nav resizes or webfonts finish loading. */
  useEffect(() => {
    const nav = navRef.current;
    if (!nav) return;
    const ro = new ResizeObserver(measure);
    ro.observe(nav);
    document.fonts?.ready.then(measure).catch(() => {});
    return () => ro.disconnect();
  }, [measure]);

  /* Close dropdowns on Escape. */
  useEffect(() => {
    const onKey = (e: KeyboardEvent) => {
      if (e.key === 'Escape') {
        setOpenIndex(null);
        setMobileOpen(false);
      }
    };
    document.addEventListener('keydown', onKey);
    return () => document.removeEventListener('keydown', onKey);
  }, []);

  /* Safety net: a panel left open while the page scrolls, or when a click
     lands anywhere outside the nav, should dismiss itself. Hover alone cannot
     be relied on — the pointer can leave the window entirely without ever
     crossing the nav's boundary. */
  useEffect(() => {
    if (openIndex === null) return;

    const close = () => {
      setOpenIndex(null);
      setHoverIndex(null);
    };
    const onPointerDown = (e: PointerEvent) => {
      if (!navRef.current?.contains(e.target as Node)) close();
    };

    window.addEventListener('scroll', close, { passive: true, capture: true });
    document.addEventListener('pointerdown', onPointerDown);
    return () => {
      window.removeEventListener('scroll', close, { capture: true });
      document.removeEventListener('pointerdown', onPointerDown);
    };
  }, [openIndex]);

  /* Lock body scroll while the mobile drawer is open. */
  useEffect(() => {
    document.body.style.overflow = mobileOpen ? 'hidden' : '';
    return () => {
      document.body.style.overflow = '';
    };
  }, [mobileOpen]);

  const openMenu = (index: number) => {
    if (closeTimer.current) window.clearTimeout(closeTimer.current);
    setHoverIndex(index);
    // Moving onto an item *without* a submenu has to close whatever was open.
    // Previously this only ever set the index, so brushing past Projects and
    // landing on Maps left the Projects panel hanging open indefinitely.
    setOpenIndex(items[index]?.children ? index : null);
  };

  const scheduleClose = () => {
    if (closeTimer.current) window.clearTimeout(closeTimer.current);
    closeTimer.current = window.setTimeout(() => {
      setHoverIndex(null);
      setOpenIndex(null);
    }, 140);
  };

  return (
    <header
      className={cn(
        'sticky top-0 z-50 w-full border-b border-white/10 bg-[#0b1a27]',
        className,
      )}
    >
      <div className="mx-auto flex h-20 max-w-[1400px] items-center gap-6 px-5 sm:px-8">
        {brand ?? <DefaultBrand />}

        {/* ---------------------------------------------------- desktop nav */}
        <nav
          ref={navRef}
          className="relative mx-auto hidden h-full items-center lg:flex"
          onMouseLeave={scheduleClose}
          aria-label="Primary"
        >
          {/* limelight */}
          <span
            aria-hidden="true"
            className={cn(
              'pointer-events-none absolute top-0 z-0 h-[3px] rounded-full bg-primary',
              'shadow-[0_0_18px_2px_var(--primary)]',
              isReady && 'transition-[left,width] duration-[400ms] ease-out',
            )}
            style={{ left: indicator.left, width: indicator.width }}
          >
            <span className="absolute left-[-30%] top-[3px] h-16 w-[160%] bg-gradient-to-b from-primary/25 to-transparent [clip-path:polygon(6%_100%,26%_0,74%_0,94%_100%)]" />
          </span>

          {items.map((item, index) => {
            const isActive = index === activeIndex;
            const isOpen = openIndex === index;

            return (
              <div
                key={item.label}
                ref={(el) => {
                  itemRefs.current[index] = el;
                }}
                className="relative z-10 h-full"
                onMouseEnter={() => openMenu(index)}
              >
                <a
                  href={item.href}
                  aria-current={isActive ? 'page' : undefined}
                  aria-expanded={item.children ? isOpen : undefined}
                  aria-haspopup={item.children ? 'true' : undefined}
                  onClick={(e) => {
                    if (item.children) {
                      e.preventDefault();
                      setOpenIndex(isOpen ? null : index);
                    }
                  }}
                  className={cn(
                    'flex h-full items-center gap-1 whitespace-nowrap px-4 text-[15px] font-medium transition-colors xl:px-5',
                    isActive ? 'text-white' : 'text-white/60 hover:text-white',
                  )}
                >
                  {item.label}
                  {item.children && (
                    <ChevronDown
                      className={cn(
                        'h-3.5 w-3.5 transition-transform duration-200',
                        isOpen && 'rotate-180',
                      )}
                    />
                  )}
                </a>

                {/* dropdown */}
                {item.children && (
                  <div
                    className={cn(
                      'absolute left-1/2 top-[calc(100%-6px)] w-[300px] -translate-x-1/2 origin-top rounded-xl border border-white/10 bg-[#12293b] p-2 shadow-2xl transition-all duration-200',
                      isOpen
                        ? 'visible translate-y-0 opacity-100'
                        : 'invisible -translate-y-1 opacity-0',
                    )}
                  >
                    {item.children.map((child) => (
                      <a
                        key={child.label}
                        href={child.href}
                        className="block rounded-lg px-3 py-2.5 transition-colors hover:bg-white/8"
                      >
                        <span className="block text-sm font-medium text-white">
                          {child.label}
                        </span>
                        {child.description && (
                          <span className="mt-0.5 block text-xs text-white/55">
                            {child.description}
                          </span>
                        )}
                      </a>
                    ))}
                  </div>
                )}
              </div>
            );
          })}
        </nav>

        {/* ------------------------------------------------------- actions */}
        <div className="ml-auto flex shrink-0 items-center gap-2.5 lg:ml-0">
          {phone && (
            <a
              href={`tel:${phone}`}
              className="hidden items-center gap-2 whitespace-nowrap px-2 text-sm font-semibold text-white transition-colors hover:text-sky-300 xl:flex"
            >
              <svg viewBox="0 0 24 24" className="h-4 w-4 text-primary" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.35 1.9.66 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.31 1.85.53 2.81.66A2 2 0 0 1 22 16.92z" />
              </svg>
              {phone}
            </a>
          )}

          {showThemeToggle && <ThemeToggle />}

          <span className="hidden shrink-0 sm:inline-block">
            <LiquidMetalButton
              href={ctaHref}
              label={ctaLabel}
              width={168}
              height={42}
              fontSize={13}
            />
          </span>

          {/* burger */}
          <button
            type="button"
            onClick={() => setMobileOpen(true)}
            aria-label="Open menu"
            className="grid h-10 w-10 cursor-pointer place-items-center rounded-lg text-white lg:hidden"
          >
            <span className="space-y-[5px]">
              <span className="block h-[2px] w-5 rounded bg-current" />
              <span className="block h-[2px] w-5 rounded bg-current" />
              <span className="block h-[2px] w-5 rounded bg-current" />
            </span>
          </button>
        </div>
      </div>

      {/* --------------------------------------------------- mobile drawer */}
      {/*
        Portaled to <body>. The header sets backdrop-blur, and backdrop-filter
        makes an element a containing block for fixed-position descendants — so
        a `fixed inset-0` drawer rendered inside <header> sizes itself to the
        80px header instead of the viewport.
      */}
      {createPortal(
        <div
          className={cn(
            'fixed inset-0 z-[60] lg:hidden',
            mobileOpen ? 'visible' : 'invisible',
          )}
        >
          <div
            onClick={() => setMobileOpen(false)}
          className={cn(
            'absolute inset-0 bg-black/50 transition-opacity duration-300',
            mobileOpen ? 'opacity-100' : 'opacity-0',
          )}
        />
        <div
          className={cn(
            'absolute right-0 top-0 flex h-full w-[86vw] max-w-sm flex-col border-l bg-background transition-transform duration-300 ease-out',
            mobileOpen ? 'translate-x-0' : 'translate-x-full',
          )}
        >
          <div className="flex items-center justify-between border-b px-5 py-4">
            <span className="text-sm font-semibold">Menu</span>
            <button
              type="button"
              onClick={() => setMobileOpen(false)}
              aria-label="Close menu"
              className="grid h-9 w-9 cursor-pointer place-items-center rounded-full border text-foreground/70 hover:bg-muted"
            >
              <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round">
                <path d="M18 6 6 18M6 6l12 12" />
              </svg>
            </button>
          </div>

          <nav className="flex-1 overflow-y-auto p-3" aria-label="Mobile">
            {items.map((item, index) => (
              <div key={item.label} className="py-0.5">
                <a
                  href={item.href}
                  className={cn(
                    'block rounded-lg px-3 py-2.5 text-[15px] font-medium transition-colors',
                    index === activeIndex
                      ? 'bg-primary text-primary-foreground'
                      : 'text-foreground/80 hover:bg-muted',
                  )}
                >
                  {item.label}
                </a>
                {item.children && (
                  <div className="ml-3 mt-0.5 border-l pl-3">
                    {item.children.map((child) => (
                      <a
                        key={child.label}
                        href={child.href}
                        className="block rounded-lg px-3 py-2 text-sm text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                      >
                        {child.label}
                      </a>
                    ))}
                  </div>
                )}
              </div>
            ))}
          </nav>

          <div className="space-y-3 border-t p-5">
            {phone && (
              <a href={`tel:${phone}`} className="block text-lg font-bold text-foreground">
                {phone}
              </a>
            )}
            <a
              href={ctaHref}
              className="block rounded-full bg-primary px-5 py-3 text-center text-sm font-semibold text-primary-foreground"
            >
              {ctaLabel}
            </a>
          </div>
        </div>
        </div>,
        document.body,
      )}
    </header>
  );
};
