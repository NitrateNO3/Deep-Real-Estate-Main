import { Facebook, Instagram, Mail, MapPin, Phone } from 'lucide-react';
import { cn } from '@/lib/utils';

export type FooterLink = { label: string; href: string };

export type SiteFooterProps = {
  address?: string;
  phone?: string;
  email?: string;
  facebookHref?: string;
  instagramHref?: string;
  explore?: FooterLink[];
  services?: FooterLink[];
  copyright?: string;
  className?: string;
};

const defaultExplore: FooterLink[] = [
  { label: 'Home', href: '#' },
  { label: 'About Us', href: '#' },
  { label: 'Maps', href: '#' },
  { label: 'Documents', href: '#' },
  { label: 'Contact Us', href: '#' },
];

const defaultServices: FooterLink[] = [
  { label: 'Residential', href: '#' },
  { label: 'Commercial', href: '#' },
  { label: 'Plots', href: '#' },
  { label: 'Developers', href: '#' },
  { label: 'Sell Your Property', href: '#' },
];

/**
 * Site footer.
 *
 * Sits on the same deep navy as the stats strip and the brands section, so the
 * page closes on a colour it has already established rather than a fifth one.
 * A hairline brand-blue rule across the top separates it from whatever section
 * it follows without needing a heavy border.
 */
export const SiteFooter = ({
  address = 'G-564, Sushant Lok-II Extn. Sector 57, Nr. Scottish High Gurgaon, Haryana-122002, India',
  phone = '+91-9810922338',
  email = 'info@deeprealestate.in',
  facebookHref = '#',
  instagramHref = '#',
  explore = defaultExplore,
  services = defaultServices,
  copyright = '© Copyright 2005-2025 Deep Real Estate . All Rights Reserved | Managed By Asterisk Serve',
  className,
}: SiteFooterProps) => {
  const linkCls =
    'text-sm text-white/60 transition-all duration-200 hover:text-white hover:pl-1';

  return (
    <footer
      className={cn(
        'relative w-full bg-[linear-gradient(180deg,#0b1a27_0%,#06121b_100%)] text-white',
        className,
      )}
    >
      {/* brand hairline */}
      <div
        aria-hidden="true"
        className="h-px w-full bg-[linear-gradient(90deg,transparent_0%,#0080c6_30%,#3aa9e8_50%,#0080c6_70%,transparent_100%)]"
      />

      <div className="mx-auto w-full max-w-[1400px] px-5 sm:px-8">
        <div className="grid grid-cols-1 gap-10 py-14 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8 lg:py-16">
          {/* brand */}
          <div className="lg:col-span-4">
            <a href="#" className="flex items-center gap-2.5" aria-label="Deep Real Estate — home">
              <span className="grid h-10 w-10 place-items-center rounded-lg bg-primary text-primary-foreground">
                <svg viewBox="0 0 24 24" className="h-5 w-5" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                  <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                </svg>
              </span>
              <span className="leading-none">
                <span className="block text-[16px] font-bold tracking-tight text-white">
                  Deep Real Estate
                </span>
                <span className="mt-1 block text-[10px] font-medium uppercase tracking-[0.16em] text-white/45">
                  Gurgaon · Since 2005
                </span>
              </span>
            </a>

            <p className="mt-5 max-w-sm text-sm leading-[1.7] text-white/55">
              Residential and commercial property across Gurgaon&apos;s sectors and DLF phases —
              matched to your budget, your location and your timeline.
            </p>

            <div className="mt-6 flex items-center gap-3">
              <a
                href={facebookHref}
                aria-label="Deep Real Estate on Facebook"
                className="grid h-10 w-10 place-items-center rounded-full border border-white/15 text-white/70 transition-all duration-200 hover:-translate-y-0.5 hover:border-primary hover:bg-primary hover:text-white"
              >
                <Facebook className="h-[18px] w-[18px]" />
              </a>
              <a
                href={instagramHref}
                aria-label="Deep Real Estate on Instagram"
                className="grid h-10 w-10 place-items-center rounded-full border border-white/15 text-white/70 transition-all duration-200 hover:-translate-y-0.5 hover:border-primary hover:bg-primary hover:text-white"
              >
                <Instagram className="h-[18px] w-[18px]" />
              </a>
            </div>
          </div>

          {/* get in touch */}
          <div className="lg:col-span-4">
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
              Get in touch
            </h2>
            <ul className="mt-6 space-y-4">
              <li className="flex gap-3">
                <MapPin className="mt-0.5 h-[18px] w-[18px] shrink-0 text-primary" />
                <span className="text-sm leading-[1.65] text-white/60">{address}</span>
              </li>
              <li className="flex gap-3">
                <Phone className="mt-0.5 h-[18px] w-[18px] shrink-0 text-primary" />
                <a
                  href={`tel:${phone.replace(/[^\d+]/g, '')}`}
                  className="text-sm font-semibold text-white transition-colors hover:text-sky-300"
                >
                  {phone}
                </a>
              </li>
              <li className="flex gap-3">
                <Mail className="mt-0.5 h-[18px] w-[18px] shrink-0 text-primary" />
                <a
                  href={`mailto:${email}`}
                  className="text-sm font-semibold text-white transition-colors hover:text-sky-300"
                >
                  {email}
                </a>
              </li>
            </ul>
          </div>

          {/* explore */}
          <div className="lg:col-span-2">
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
              Explore
            </h2>
            <ul className="mt-6 space-y-3">
              {explore.map((l) => (
                <li key={l.label}>
                  <a href={l.href} className={linkCls}>
                    {l.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          {/* services */}
          <div className="lg:col-span-2">
            <h2 className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
              Properties
            </h2>
            <ul className="mt-6 space-y-3">
              {services.map((l) => (
                <li key={l.label}>
                  <a href={l.href} className={linkCls}>
                    {l.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>
        </div>

        {/* bottom bar */}
        <div className="flex flex-col items-center justify-between gap-3 border-t border-white/10 py-6 sm:flex-row">
          <p className="text-center text-xs text-white/45 sm:text-left">{copyright}</p>
          <a
            href={`tel:${phone.replace(/[^\d+]/g, '')}`}
            className="text-xs font-semibold text-sky-300 transition-colors hover:text-white"
          >
            {phone}
          </a>
        </div>
      </div>
    </footer>
  );
};
