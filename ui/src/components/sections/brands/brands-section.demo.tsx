import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SearchBand } from '@/components/sections/search/search-band';
import { WelcomeSection } from '@/components/sections/welcome/welcome-section';
import { MapsSection } from '@/components/sections/maps/maps-section';
import { StatsBand } from '@/components/sections/stats/stats-band';
import { PropertiesSection } from '@/components/sections/properties/properties-section';
import { ContactSection } from '@/components/sections/contact/contact-section';
import { BrandsSection } from './brands-section';

/** The section on its own. */
export const Standalone = () => (
  <div className="min-h-dvh bg-background">
    <BrandsSection />
  </div>
);

/**
 * The home page — five screens.
 *   1 · header + search + welcome
 *   2 · ask about property (developer logos)
 *   3 · maps, closed by the stats strip
 *   4 · featured & top properties
 *   5 · contact form + process flow
 */
export const HomeSoFar = () => (
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
  </div>
);
