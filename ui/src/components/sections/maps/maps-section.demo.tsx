import { SiteHeader } from '@/components/ui/navbar/site-header';
import { SearchBand } from '@/components/sections/search/search-band';
import { WelcomeSection } from '@/components/sections/welcome/welcome-section';
import { MapsSection } from './maps-section';

/** The section on its own. */
export const Standalone = () => (
  <div className="min-h-dvh bg-background">
    <MapsSection />
  </div>
);

/**
 * The home page as it stands — one section per screen.
 *
 * The wrapper is the scroll container (`h-dvh overflow-y-auto`) and carries
 * scroll-snap, so one scroll moves from screen 1 to screen 2 and lands on the
 * maps section exactly, with no partial state in between. Both children are
 * `h-dvh snap-start`. Snapping is lg-and-up only; forcing a phone to one
 * section per screen fights the user.
 */
export const HomeSoFar = () => (
  <div className="h-dvh overflow-y-auto scroll-smooth bg-background lg:snap-y lg:snap-mandatory">
    {/* screen 1 — header + search + welcome */}
    <section className="flex flex-col lg:h-dvh lg:snap-start">
      <div className="shrink-0">
        <SiteHeader activeIndex={0} />
        <SearchBand onSearch={(q) => console.log('search:', q)} />
      </div>
      <div className="lg:min-h-0 lg:flex-1">
        <WelcomeSection fill />
      </div>
    </section>

    {/* screen 2 — maps */}
    <section className="lg:h-dvh lg:snap-start">
      <MapsSection fill />
    </section>
  </div>
);
