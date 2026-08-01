import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SearchBand } from '@/components/sections/search/search-band';
import { WelcomeSection } from '@/components/sections/welcome/welcome-section';
import { BrandsSection } from '@/components/sections/brands/brands-section';
import { MapsSection } from '@/components/sections/maps/maps-section';
import { StatsBand } from '@/components/sections/stats/stats-band';
import { PropertiesSection } from '@/components/sections/properties/properties-section';
import { ContactSection } from '@/components/sections/contact/contact-section';
import { SiteFooter } from './site-footer';

/** The footer on its own, over a short filler block. */
export const Standalone = () => (
  <div className="min-h-dvh bg-background">
    <div className="grid h-[45vh] place-items-center text-sm text-muted-foreground">
      section above
    </div>
    <SiteFooter />
  </div>
);

/**
 * The full home page — six screens.
 *   1 · header + search + welcome
 *   2 · ask about property
 *   3 · maps + stats strip
 *   4 · featured & top properties
 *   5 · contact + process flow
 *   6 · footer
 */
export const HomePage = () => (
  <div className="h-dvh overflow-y-auto scroll-smooth bg-background lg:snap-y lg:snap-mandatory">
    <section className="flex flex-col lg:h-dvh lg:snap-start">
      <div className="shrink-0">
        <SiteHeader activeIndex={0} />
        <SearchBand onSearch={(q) => console.log('search:', q)} />
      </div>
      <div className="lg:min-h-0 lg:flex-1">
        <WelcomeSection fill />
      </div>
    </section>

    <section className="lg:h-dvh lg:snap-start">
      <BrandsSection fill />
    </section>

    <section className="flex flex-col lg:min-h-dvh lg:snap-start">
      <div className="lg:min-h-0 lg:flex-1">
        <MapsSection fill />
      </div>
      <div className="shrink-0">
        <StatsBand />
      </div>
    </section>

    <section className="lg:h-dvh lg:snap-start">
      <PropertiesSection fill />
    </section>

    <section className="lg:min-h-dvh lg:snap-start">
      <ContactSection fill onSubmit={(v) => console.log('contact:', v)} />
    </section>

    {/* The footer is its own snap target. It is shorter than a viewport, so
        snap-start simply aligns its top and the scroll clamps at the end. */}
    <section className="lg:snap-start">
      <SiteFooter />
    </section>
  </div>
);
