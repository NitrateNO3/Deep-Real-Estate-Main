import { useEffect, useRef } from 'react';
import { cn } from '@/lib/utils';

export type Corridor = {
  /** The road or pocket, as people actually name it. */
  name: string;
  /** One line on what it is. Not a listing — a bearing. */
  body: string;
};

/**
 * The corridors, in the order a buyer tends to meet them: the established
 * address first, then what is being built next to it, then the newer ground.
 *
 * Written as description rather than as numbers on purpose. A price or a
 * yield printed into the bundle is wrong within a quarter and nobody comes
 * back to correct it; what a road is *for* stays true, and it is the thing a
 * buyer new to Gurugram actually cannot look up.
 */
const defaultCorridors: Corridor[] = [
  {
    name: 'Golf Course Road',
    body: 'The established spine. The phases and towers that set the ceiling here, and the address most buyers name before any other.',
  },
  {
    name: 'Golf Course Extension',
    body: 'The same road, a decade younger. Newer towers, more space between them, and prices still finding their level.',
  },
  {
    name: 'Sohna Road',
    body: 'Where the middle of the market lives. Offices at one end, family housing at the other, and a short run between the two.',
  },
  {
    name: 'Dwarka Expressway',
    body: 'The corridor that redrew the map. Built for the city Gurugram is becoming rather than the one it grew out of.',
  },
  {
    name: 'New Gurugram',
    body: 'The sectors out past the highway. Larger townships, more air, and the feel of a city still laying itself out.',
  },
  {
    name: 'Sushant Lok & Sector 57',
    body: 'Low-rise, planted, and settled. Our own street — which is the reason we can tell you which block is worth the asking price.',
  },
];

export type GurugramSectionProps = {
  eyebrow?: string;
  heading?: string;
  lede?: string;
  corridors?: Corridor[];
  /** Background video. Pass '' to fall back to the flat tint. */
  videoSrc?: string;
  /** Shown while the video loads, and instead of it under reduced motion. */
  videoPoster?: string;
  fill?: boolean;
  className?: string;
};

/**
 * Homepage section 2 — the city itself.
 *
 * It replaces the developer marquee that used to sit here. A wall of other
 * firms' logos is a claim about who the firm knows; on the second screen of
 * the page, before anything has been said about Gurugram, it asked the visitor
 * to be impressed by names rather than told anything they came for. The
 * marquee still exists, on the About page, where a claim about the firm
 * belongs.
 *
 * What stands here instead is the one thing a twenty-year local firm has that
 * a portal does not: knowing that the six roads are six different markets, and
 * being able to say how. Same dark treatment and same city footage, so the
 * page keeps the visual beat this slot always had.
 */
export const GurugramSection = ({
  eyebrow = 'The Millennium City',
  heading = 'Gurugram is six markets wearing one name',
  lede = 'Every corridor prices differently, builds differently and fills differently. Twenty years here is mostly knowing which one you are actually standing in.',
  corridors = defaultCorridors,
  videoSrc = '/video/brands-bg.mp4',
  videoPoster = '/img/bg/city.jpg',
  fill = false,
  className,
}: GurugramSectionProps) => {
  const videoRef = useRef<HTMLVideoElement | null>(null);

  /* Same handling the marquee section used, and for the same reasons:
     autoplaying footage is motion nobody asked for, so reduced-motion holds
     the poster frame, and off-screen decoding of a 1080p loop was costing
     frames on every scroll. */
  useEffect(() => {
    const el = videoRef.current;
    if (!el) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      el.removeAttribute('autoplay');
      el.pause();
      return;
    }

    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) void el.play().catch(() => {});
        else el.pause();
      },
      { threshold: 0.01 },
    );
    observer.observe(el);
    return () => observer.disconnect();
  }, []);

  return (
    <section
      className={cn(
        'relative isolate w-full overflow-hidden bg-[#06121b]',
        fill && 'lg:flex lg:h-full lg:min-h-0 lg:items-center',
        className,
      )}
    >
      {videoSrc && (
        <video
          ref={videoRef}
          className="absolute inset-0 -z-10 h-full w-full object-cover"
          src={videoSrc}
          poster={videoPoster}
          autoPlay
          muted
          loop
          playsInline
          preload="metadata"
          aria-hidden="true"
          tabIndex={-1}
        />
      )}
      {/* Legibility wash — the copy and the cards are both white-on-dark, so
          the footage has to sit well back. */}
      <div
        aria-hidden="true"
        className="absolute inset-0 -z-10 bg-[linear-gradient(180deg,rgba(6,18,27,0.92)_0%,rgba(6,18,27,0.78)_45%,rgba(6,18,27,0.94)_100%)]"
      />

      <div
        className={cn(
          'mx-auto w-full max-w-[1400px] px-5 sm:px-8',
          fill ? 'py-16 lg:py-12' : 'py-20 sm:py-24',
        )}
      >
        <div className="mx-auto max-w-3xl text-center">
          <div className="flex items-center justify-center gap-3">
            <span className="h-px w-8 bg-sky-300/70" />
            <p className="text-xs font-semibold uppercase tracking-[0.18em] text-sky-300">
              {eyebrow}
            </p>
            <span className="h-px w-8 bg-sky-300/70" />
          </div>
          <h2 className="mt-5 text-3xl font-bold leading-[1.1] tracking-tight text-white sm:text-[2.6rem]">
            {heading}
          </h2>
          <p className="mt-5 text-[16px] leading-[1.7] text-white/70">{lede}</p>
        </div>

        <ul
          className={cn(
            'grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3',
            fill ? 'mt-10' : 'mt-14',
          )}
        >
          {corridors.map((c, i) => (
            <li
              key={c.name}
              /* Glass over footage rather than a solid tile: the city stays
                 visible through the card, which is the whole reason there is
                 footage behind it. */
              className="group/corridor relative overflow-hidden rounded-2xl border border-white/12 bg-white/[0.04] p-5 backdrop-blur-[2px] transition-all duration-300 hover:-translate-y-1 hover:border-sky-300/45 hover:bg-white/[0.07] sm:p-6"
            >
              {/* the rule fills in from the left on hover — the same marker the
                  About page uses on its mission plates */}
              <span
                aria-hidden="true"
                className="pointer-events-none absolute inset-y-0 left-0 w-[3px] bg-sky-300/25 transition-colors duration-300 group-hover/corridor:bg-sky-300"
              />
              <p className="text-[11px] font-bold tabular-nums tracking-[0.18em] text-sky-300/80">
                {String(i + 1).padStart(2, '0')}
              </p>
              <h3 className="mt-2 text-[19px] font-bold leading-tight tracking-tight text-white">
                {c.name}
              </h3>
              <p className="mt-2 text-[14.5px] leading-[1.6] text-white/65">{c.body}</p>
            </li>
          ))}
        </ul>
      </div>
    </section>
  );
};
