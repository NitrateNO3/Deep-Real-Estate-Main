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
 * being able to say how.
 *
 * The backdrop is drawn rather than filmed — a surveyor's grid under a wash of
 * the brand blue, fading out at the edges. Stock footage of a city that is not
 * this one was working against copy whose whole point is local specificity,
 * and it cost 9MB to say less than a grid does.
 */
export const GurugramSection = ({
  eyebrow = 'The Millennium City',
  heading = 'Gurugram is six markets wearing one name',
  lede = 'Every corridor prices differently, builds differently and fills differently. Twenty years here is mostly knowing which one you are actually standing in.',
  corridors = defaultCorridors,
  fill = false,
  className,
}: GurugramSectionProps) => {
  return (
    <section
      className={cn(
        'relative isolate w-full overflow-hidden bg-[#06121b]',
        fill && 'lg:flex lg:h-full lg:min-h-0 lg:items-center',
        className,
      )}
    >
      {/* Surveyor's grid. Masked to fade out well before the edges, so it
          reads as texture under the copy rather than as a table drawn round
          it — an unmasked grid running into the section's corners is the
          thing that makes this treatment look like a placeholder. */}
      <div
        aria-hidden="true"
        className="absolute inset-0 -z-10 bg-[linear-gradient(to_right,rgba(255,255,255,0.055)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.055)_1px,transparent_1px)] bg-[length:72px_72px] [mask-image:radial-gradient(ellipse_75%_65%_at_50%_45%,#000_35%,transparent_100%)]"
      />
      {/* Brand-blue wash falling from the top edge, and a second, tighter one
          under the heading — together they lift the middle of the section off
          the flat navy so the cards have something to sit on. */}
      <div
        aria-hidden="true"
        className="absolute inset-0 -z-10 bg-[radial-gradient(70%_55%_at_50%_-10%,rgba(0,128,198,0.30)_0%,transparent_65%),radial-gradient(40%_30%_at_50%_28%,rgba(11,154,224,0.16)_0%,transparent_70%)]"
      />
      {/* Floor and ceiling, so the section closes cleanly against whatever
          white sits above and below it on the page. */}
      <div
        aria-hidden="true"
        className="absolute inset-0 -z-10 bg-[linear-gradient(180deg,rgba(6,18,27,0.55)_0%,transparent_22%,transparent_78%,rgba(6,18,27,0.85)_100%)]"
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
              /* A lit face rather than flat white at 4%: with a drawn ground
                 behind it there is nothing to frost, so the card earns its
                 edge from a top-down gradient and a hairline instead. */
              className="group/corridor relative overflow-hidden rounded-2xl border border-white/12 bg-[linear-gradient(160deg,rgba(255,255,255,0.075)_0%,rgba(255,255,255,0.03)_55%,rgba(255,255,255,0.015)_100%)] p-5 shadow-[0_18px_40px_-28px_rgb(0_0_0/0.9)] transition-all duration-300 hover:-translate-y-1 hover:border-sky-300/45 hover:bg-[linear-gradient(160deg,rgba(255,255,255,0.11)_0%,rgba(255,255,255,0.05)_55%,rgba(255,255,255,0.02)_100%)] sm:p-6"
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
