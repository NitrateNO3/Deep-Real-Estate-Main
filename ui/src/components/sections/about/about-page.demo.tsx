import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SiteFooter } from '@/components/sections/footer/site-footer';
import { StatsBand } from '@/components/sections/stats/stats-band';
import { AboutIntro } from './about-intro';
import { AboutMission } from './about-mission';

/** Section 1 on its own. */
export const Intro = () => (
  <div className="min-h-dvh bg-background">
    <SiteHeader activeIndex={1} />
    <AboutIntro />
  </div>
);

/** Section 2 on its own. */
export const Mission = () => (
  <div className="min-h-dvh bg-background">
    <SiteHeader activeIndex={1} />
    <AboutMission />
  </div>
);

/**
 * The About Us page.
 *   nav (limelight on About Us) → intro → mission & vision → footer
 *
 * Same snap rhythm as the home page, so moving between the two pages does not
 * change how scrolling behaves.
 */
export const AboutPage = () => (
  <div className="h-dvh overflow-y-auto scroll-smooth bg-background lg:snap-y lg:snap-mandatory">
    {/* min-h-dvh, not h-dvh: this screen now also carries the 104px stats strip,
        and on a short laptop the intro would otherwise collide with it. */}
    <section className="flex flex-col lg:min-h-dvh lg:snap-start">
      <div className="shrink-0">
        {/* activeIndex 1 puts the limelight on About Us */}
        <SiteHeader activeIndex={1} />
      </div>
      <div className="lg:min-h-0 lg:flex-1">
        <AboutIntro fill />
      </div>
      {/* same strip as the home page, closing screen one */}
      <div className="shrink-0">
        <StatsBand />
      </div>
    </section>

    {/* Sized to its content, not to a viewport. Forcing min-h-dvh here was what
        created the gap — the copy simply does not fill a full screen. */}
    <section className="lg:snap-start">
      <AboutMission />
    </section>

    <section className="lg:snap-start">
      <SiteFooter />
    </section>
  </div>
);
