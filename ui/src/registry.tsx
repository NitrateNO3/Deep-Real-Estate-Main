import type { ReactNode } from 'react';
import * as LimelightNavDemos from '@/components/ui/navbar/limelight-nav.demo';
import * as SiteHeaderDemos from '@/components/ui/navbar/site-header.demo';
import * as WelcomeDemos from '@/components/sections/welcome/welcome-section.demo';
import * as StarButtonDemos from '@/components/ui/star-button/star-button.demo';
import * as SearchBandDemos from '@/components/sections/search/search-band.demo';
import * as MapsDemos from '@/components/sections/maps/maps-section.demo';
import * as PropertiesDemos from '@/components/sections/properties/properties-section.demo';
import * as ProcessDemos from '@/components/sections/process/process-section.demo';
import * as StatsDemos from '@/components/sections/stats/stats-band.demo';
import * as ContactDemos from '@/components/sections/contact/contact-section.demo';
import * as LiquidMetalDemos from '@/components/ui/liquid-metal-button/liquid-metal-button.demo';
import * as BrandsDemos from '@/components/sections/brands/brands-section.demo';
import * as FooterDemos from '@/components/sections/footer/site-footer.demo';
import * as AboutDemos from '@/components/sections/about/about-page.demo';
import * as MapsPageDemos from '@/components/sections/maps-page/maps-page.demo';
import * as ContactPageDemos from '@/components/sections/contact-page/contact-page.demo';

export type PreviewEntry = {
  /** Unique slug, used in the URL hash. */
  id: string;
  /** Folder / category shown in the sidebar. */
  group: string;
  /** Label shown in the sidebar. */
  name: string;
  /**
   * 'center' (default) drops the component in a padded, centred stage.
   * 'full'   renders it edge-to-edge — use for headers, footers, full pages.
   */
  layout?: 'center' | 'full';
  render: () => ReactNode;
};

/*
  ADD A NEW COMPONENT
  -------------------
  1. Create  src/components/ui/<folder>/<component>.tsx
  2. Create  src/components/ui/<folder>/<component>.demo.tsx  exporting demos
  3. Import it above and add an entry below. That's it.
*/
export const registry: PreviewEntry[] = [
  {
    id: 'home-search',
    group: 'Home page',
    name: '0 · Search band — in page',
    layout: 'full',
    render: () => <SearchBandDemos.InPage />,
  },
  {
    id: 'home-search-dark',
    group: 'Home page',
    name: '0 · Search band — dark field',
    layout: 'full',
    render: () => <SearchBandDemos.OnDarkBand />,
  },
  {
    id: 'home-search-solo',
    group: 'Home page',
    name: '0 · Search band — standalone',
    layout: 'full',
    render: () => <SearchBandDemos.Standalone />,
  },
  {
    id: 'home-brands',
    group: 'Home page',
    name: '2 · Ask about property',
    layout: 'full',
    render: () => <BrandsDemos.Standalone />,
  },
  {
    id: 'home-maps',
    group: 'Home page',
    name: '2 · Maps — standalone',
    layout: 'full',
    render: () => <MapsDemos.Standalone />,
  },
  {
    id: 'home-properties',
    group: 'Home page',
    name: '3 · Featured & top properties',
    layout: 'full',
    render: () => <PropertiesDemos.Standalone />,
  },
  {
    id: 'home-stats',
    group: 'Home page',
    name: '4 · Stats band (104px)',
    layout: 'full',
    render: () => <StatsDemos.Standalone />,
  },
  {
    id: 'home-contact',
    group: 'Home page',
    name: '5 · Contact + process flow',
    layout: 'full',
    render: () => <ContactDemos.Standalone />,
  },
  {
    id: 'home-so-far',
    group: 'Home page',
    name: '★ Home page so far',
    layout: 'full',
    render: () => <FooterDemos.HomePage />,
  },
  {
    id: 'maps-page',
    group: 'Maps page',
    name: '★ Maps — full page',
    layout: 'full',
    render: () => <MapsPageDemos.MapsFullPage />,
  },
  {
    id: 'contact-page',
    group: 'Contact page',
    name: '★ Contact Us — full page',
    layout: 'full',
    render: () => <ContactPageDemos.ContactFullPage />,
  },
  {
    id: 'about-page',
    group: 'About page',
    name: '★ About Us — full page',
    layout: 'full',
    render: () => <AboutDemos.AboutPage />,
  },
  {
    id: 'about-intro',
    group: 'About page',
    name: '1 · Intro',
    layout: 'full',
    render: () => <AboutDemos.Intro />,
  },
  {
    id: 'about-mission',
    group: 'About page',
    name: '2 · Mission and vision',
    layout: 'full',
    render: () => <AboutDemos.Mission />,
  },
  {
    id: 'home-footer',
    group: 'Home page',
    name: '6 · Footer',
    layout: 'full',
    render: () => <FooterDemos.Standalone />,
  },
  {
    id: 'home-process-long',
    group: 'Home page',
    name: '(kept) Our process — full section',
    layout: 'full',
    render: () => <ProcessDemos.Standalone />,
  },
  {
    id: 'home-welcome',
    group: 'Home page',
    name: '1 · Welcome — with header',
    layout: 'full',
    render: () => <WelcomeDemos.WithHeader />,
  },
  {
    id: 'home-welcome-solo',
    group: 'Home page',
    name: '1 · Welcome — standalone',
    layout: 'full',
    render: () => <WelcomeDemos.Standalone />,
  },
  {
    id: 'home-welcome-left',
    group: 'Home page',
    name: '1 · Welcome — picture left',
    layout: 'full',
    render: () => <WelcomeDemos.PictureLeft />,
  },
  {
    id: 'site-header',
    group: 'Navbar',
    name: 'Site Header — In Page',
    layout: 'full',
    render: () => <SiteHeaderDemos.InPage />,
  },
  {
    id: 'site-header-active',
    group: 'Navbar',
    name: 'Site Header — Active: Projects',
    layout: 'full',
    render: () => <SiteHeaderDemos.HeaderOnly />,
  },
  {
    id: 'site-header-minimal',
    group: 'Navbar',
    name: 'Site Header — Minimal',
    layout: 'full',
    render: () => <SiteHeaderDemos.Minimal />,
  },
  {
    id: 'liquid-metal-button',
    group: 'Buttons',
    name: 'Liquid Metal Button',
    render: () => <LiquidMetalDemos.Default />,
  },
  {
    id: 'star-button',
    group: 'Buttons',
    name: 'Star Button — default',
    render: () => <StarButtonDemos.Default />,
  },
  {
    id: 'star-button-as-used',
    group: 'Buttons',
    name: 'Star Button — as used',
    render: () => <StarButtonDemos.AsUsed />,
  },
  {
    id: 'star-button-variants',
    group: 'Buttons',
    name: 'Star Button — variants',
    render: () => <StarButtonDemos.Variants />,
  },
  {
    id: 'limelight-nav-default',
    group: 'Navbar',
    name: 'Limelight Nav — Default',
    render: () => <LimelightNavDemos.Default />,
  },
  {
    id: 'limelight-nav-customized',
    group: 'Navbar',
    name: 'Limelight Nav — Customized',
    render: () => <LimelightNavDemos.Customized />,
  },
];
