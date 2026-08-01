import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SearchBand } from '@/components/sections/search/search-band';
import { WelcomeSection } from '@/components/sections/welcome/welcome-section';
import { MapsSection } from '@/components/sections/maps/maps-section';
import { PropertiesSection } from '@/components/sections/properties/properties-section';
import { ProcessSection } from './process-section';

/** The section on its own. */
export const Standalone = () => (
  <div className="min-h-dvh bg-background">
    <ProcessSection />
  </div>
);

/**
 * The home page so far — four screens, one section each, snap-scrolled.
 * 1 · welcome   2 · maps   3 · properties   4 · process
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
      <MapsSection fill />
    </section>

    <section className="lg:h-dvh lg:snap-start">
      <PropertiesSection fill />
    </section>

    <section className="lg:h-dvh lg:snap-start">
      <ProcessSection fill />
    </section>
  </div>
);
