---
name: LajuPesan Elite
colors:
  surface: '#fff8f4'
  surface-dim: '#e4d8ce'
  surface-bright: '#fff8f4'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#fef1e7'
  surface-container: '#f8ece2'
  surface-container-high: '#f2e6dc'
  surface-container-highest: '#ece0d7'
  on-surface: '#201b15'
  on-surface-variant: '#514538'
  inverse-surface: '#362f29'
  inverse-on-surface: '#fbefe5'
  outline: '#837566'
  outline-variant: '#d5c4b2'
  surface-tint: '#855300'
  primary: '#653e00'
  on-primary: '#ffffff'
  primary-container: '#855300'
  on-primary-container: '#ffd09a'
  inverse-primary: '#fdb965'
  secondary: '#855300'
  on-secondary: '#ffffff'
  secondary-container: '#fea619'
  on-secondary-container: '#684000'
  tertiary: '#004b6f'
  on-tertiary: '#ffffff'
  tertiary-container: '#116490'
  on-tertiary-container: '#b5ddff'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffddb8'
  primary-fixed-dim: '#fdb965'
  on-primary-fixed: '#2a1700'
  on-primary-fixed-variant: '#653e00'
  secondary-fixed: '#ffddb8'
  secondary-fixed-dim: '#ffb95f'
  on-secondary-fixed: '#2a1700'
  on-secondary-fixed-variant: '#653e00'
  tertiary-fixed: '#cae6ff'
  tertiary-fixed-dim: '#8ccdff'
  on-tertiary-fixed: '#001e2f'
  on-tertiary-fixed-variant: '#004b70'
  background: '#fff8f4'
  on-background: '#201b15'
  surface-variant: '#ece0d7'
typography:
  display-lg:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: 40px
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
    letterSpacing: -0.01em
  headline-sm:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  body-lg:
    fontFamily: Work Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-md:
    fontFamily: Work Sans
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-md:
    fontFamily: Work Sans
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.05em
  button-text:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 4px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 32px
  container-padding: 20px
  element-gap: 12px
---

## Brand & Style
The design system is anchored in an "Elite Service" narrative, prioritizing high-velocity efficiency with a high-tier aesthetic. The style blends **Modern Minimalism** with **Glassmorphism** to create a sense of depth and transparency—mimicking the pristine glassware and polished surfaces of fine dining environments. 

The interface should evoke a sense of calm authority. It avoids the cluttered, "industrial" look of traditional POS systems in favor of a breathable, airy mobile experience. Key interactions should feel soft yet responsive, utilizing subtle motion and layered translucency to guide the user through the ordering and checkout flow without friction.

## Colors
The palette is rooted in Earth tones and precious metals. 
- **Bronze (Primary)** is used for high-importance actions, navigation headers, and branding elements to establish a premium anchor.
- **Amber (Accent)** is used sparingly for interactive highlights, notifications, or "Active" status indicators to provide warmth and visibility.
- **Clean Off-white (Background)** ensures the app feels spacious and reduces eye strain during long shifts.
- **Surface & Glass:** Use pure white for cards. For floating elements like modals or top navigation bars, use the glass overlay variable with a 20px backdrop blur to maintain context of the underlying layers.

## Typography
This design system uses a dual-font strategy to balance authority with readability. 
- **Inter** is reserved for structural elements: titles, price totals, and navigational headers. Its geometric precision conveys modern reliability.
- **Work Sans** handles the bulk of the information: menu item descriptions, modifier lists, and customer details. Its slightly wider apertures ensure legibility in fast-paced, high-glare environments.
- **Scaling:** For mobile POS views, avoid sizes smaller than 12px. Ensure primary price points always use `headline-md` or larger for instant recognition.

## Layout & Spacing
The layout follows a strict 4px baseline grid to ensure mathematical harmony. 
- **Mobile:** Uses a fluid single-column layout with 20px side margins. 
- **Touch Targets:** All interactive elements must maintain a minimum height of 48px to accommodate rapid tactile input.
- **Padding:** Use "Professional Spacing"—wider internal padding in cards (20px or 24px) to create an expensive, uncrowded feel. Menu items should have generous vertical breathing room to prevent accidental taps.

## Elevation & Depth
Hierarchy is established through **Ambient Shadows** and **Tonal Layering** rather than harsh borders.
- **Level 0 (Background):** #F7F9FB.
- **Level 1 (Cards/Base UI):** White surface with a very soft, diffused shadow: `0px 4px 20px rgba(25, 28, 30, 0.04)`.
- **Level 2 (Active/Floating):** Use glassmorphism. A semi-transparent white background with a 20px blur and a subtle 1px inner border (white, 20% opacity) to simulate the edge of a glass pane.
- **Level 3 (Modals/Popovers):** Higher elevation shadow: `0px 12px 40px rgba(0, 0, 0, 0.08)`.

## Shapes
The shape language is "Soft-Organic." Square corners are avoided entirely to maintain the approachable, premium feel. 
- Use **12px (md)** for standard buttons and input fields.
- Use **20px (lg)** for primary container cards and bottom sheets.
- Use **Pill-shaped** for status tags (e.g., "Paid", "Pending") and secondary action chips.

## Components
- **Buttons:** Primary buttons use a solid Bronze fill with White text. Secondary buttons use a transparent background with a 1px Bronze border. All buttons should have a subtle scale-down effect (0.98x) on tap to provide tactile feedback.
- **Input Fields:** Use a subtle off-white fill with a bottom-only 2px border in Bronze when focused. This mimics high-end stationery.
- **F&B Cards:** Menu items should feature high-quality imagery. The price is anchored at the bottom-right using Amber text. Use a glassmorphic overlay for the "Add" (+) button.
- **Order List:** Use zebra-striping with a very faint tint of Bronze (2% opacity) to distinguish between rows without using heavy lines.
- **Checkout Bar:** A persistent, floating glassmorphic bar at the bottom of the screen that summarizes the total and provides a "Process Payment" CTA.
- **Status Chips:** Use Amber for "In Progress" and Bronze for "Completed" to maintain brand consistency while indicating lifecycle stages.