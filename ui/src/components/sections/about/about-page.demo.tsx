import { SiteHeader } from '@/components/ui/navbar/site-header';
import { ScrollCue } from '@/components/ui/scroll-cue/scroll-cue';
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
 * Scrolls normally, same as every other page — screens are still sized to the
 * viewport, but nothing snaps the scroll to their boundaries.
 */
export const AboutPage = () => (
  <div className="min-h-dvh scroll-smooth bg-background">
    {/* min-h-dvh, not h-dvh: this screen now also carries the 104px stats strip,
        and on a short laptop the intro would otherwise collide with it. */}
    <section className="flex flex-col lg:min-h-dvh">
      <div className="shrink-0">
        {/* activeIndex 1 puts the limelight on About Us */}
        <SiteHeader activeIndex={1} />
      </div>
      <div className="lg:min-h-0 lg:flex-1">
        <AboutIntro fill />
      </div>
      {/* screen one ends exactly at the fold, so nothing tells you the page
          carries on — this does, and takes you there. Symmetric padding, so the
          cue is centred in its own strip rather than hanging off the bottom of
          the copy and pressing against the stats band. */}
      <div className="flex shrink-0 items-center justify-center py-5">
        <ScrollCue targetId="about-mission" label="More below" />
      </div>
      {/* same strip as the home page, closing screen one */}
      <div className="shrink-0">
        <StatsBand />
      </div>
    </section>

    {/* Sized to its content, not to a viewport. Forcing min-h-dvh here was what
        created the gap — the copy simply does not fill a full screen. */}
    <section id="about-mission" className="scroll-mt-20">
      <AboutMission />
    </section>
    <section>
      <SiteFooter />
    </section>
  </div>
);
