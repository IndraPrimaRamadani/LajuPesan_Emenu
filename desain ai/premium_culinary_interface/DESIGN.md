---
name: Premium Culinary Interface
colors:
  surface: '#f7f9fb'
  surface-dim: '#d8dadc'
  surface-bright: '#f7f9fb'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f2f4f6'
  surface-container: '#eceef0'
  surface-container-high: '#e6e8ea'
  surface-container-highest: '#e0e3e5'
  on-surface: '#191c1e'
  on-surface-variant: '#534434'
  inverse-surface: '#2d3133'
  inverse-on-surface: '#eff1f3'
  outline: '#867461'
  outline-variant: '#d8c3ad'
  surface-tint: '#855300'
  primary: '#855300'
  on-primary: '#ffffff'
  primary-container: '#f59e0b'
  on-primary-container: '#613b00'
  inverse-primary: '#ffb95f'
  secondary: '#545f73'
  on-secondary: '#ffffff'
  secondary-container: '#d5e0f8'
  on-secondary-container: '#586377'
  tertiary: '#944a23'
  on-tertiary: '#ffffff'
  tertiary-container: '#f79a6c'
  on-tertiary-container: '#72300a'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffddb8'
  primary-fixed-dim: '#ffb95f'
  on-primary-fixed: '#2a1700'
  on-primary-fixed-variant: '#653e00'
  secondary-fixed: '#d8e3fb'
  secondary-fixed-dim: '#bcc7de'
  on-secondary-fixed: '#111c2d'
  on-secondary-fixed-variant: '#3c475a'
  tertiary-fixed: '#ffdbcc'
  tertiary-fixed-dim: '#ffb693'
  on-tertiary-fixed: '#351000'
  on-tertiary-fixed-variant: '#76330d'
  background: '#f7f9fb'
  on-background: '#191c1e'
  surface-variant: '#e0e3e5'
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
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-lg:
    fontFamily: Work Sans
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
    letterSpacing: 0.05em
  label-sm:
    fontFamily: Work Sans
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
  price-display:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '700'
    lineHeight: 24px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 4px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 40px
  container-margin-mobile: 16px
  container-margin-desktop: 10%
  gutter: 16px
---

## Brand & Style

This design system is built on a "Premium Minimalist" philosophy, blending the functional clarity of the Google Play Store with the sensory richness of a high-end dining experience. The goal is to evoke a sense of appetite, cleanliness, and effortless luxury. 

The aesthetic is characterized by high-legibility typography, generous whitespace, and a "layered-glass" effect that suggests depth without clutter. The brand voice is professional yet welcoming (Indonesian: *Ramah & Profesional*), ensuring that the digital menu acts as an elegant extension of the physical restaurant service. 

Visual accents include:
- **Soft Shadows:** Multi-layered, low-opacity shadows to lift cards from the background.
- **Glassmorphism:** Used for top navigation bars and floating action buttons to maintain context of the content beneath.
- **Subtle Illustrations:** Faint, single-line food illustrations (opacity 5-8%) on the background to add texture and a "boutique" feel.

## Colors

The palette is centered around **Amber (#f59e0b)**, chosen for its psychological connection to warmth and appetite.

- **Primary:** Amber (#f59e0b) is used for call-to-action buttons, active states, and price highlights.
- **Secondary:** Slate Blue-Gray (#1e293b) provides high-contrast legibility for text and icon headers.
- **Background:** A very light "Off-White" (#f8fafc) is used to keep the interface feeling airy and hygienic.
- **Glass Accents:** Translucent white overlays (RGBA 255, 255, 255, 0.7) with a 20px backdrop blur are used for floating navigation elements.

## Typography

This design system utilizes **Inter** for its modern, neutral, and highly readable characteristics, making it ideal for menu descriptions and interface labels. **Work Sans** is used sparingly for labels and metadata to provide a subtle professional contrast.

For the Indonesian language:
- Ensure long food descriptions (e.g., *Rekomendasi Chef*) have adequate line heights (1.5x) to prevent crowding.
- **Display-lg** is reserved for category titles (e.g., *Hidangan Utama*).
- **Price-display** is a custom role specifically for "Rp" currency formatting to ensure cost visibility.

## Layout & Spacing

The layout follows a **8-point grid system**. 

### Mobile (Mobile-First)
Content is arranged in a single fluid column with `16px` side margins. Navigation is anchored to a bottom bar or a floating glassmorphism header.

### Desktop (Split-Screen)
On larger screens, the application adopts a split-screen or 3-column model:
1. **Left/Center:** The interactive menu grid (fluid 12-column grid, 24px gutters).
2. **Right:** A fixed "Pesanan Saya" (My Order) sidebar that acts as a persistent cart summary.

### Spacing Rhythm
- Use `16px` (md) for internal card padding.
- Use `24px` (lg) to separate distinct food categories.
- Use `40px` (xl) for section headers and top-of-page margins.

## Elevation & Depth

This design system avoids heavy borders in favor of depth and light.

- **Level 0 (Background):** #f8fafc with subtle, repeating food-themed line art patterns.
- **Level 1 (Cards):** Pure white (#ffffff) with a 1px soft gray border (#f1f5f9) and a very soft, diffused shadow: `0 4px 20px -2px rgba(0, 0, 0, 0.05)`.
- **Level 2 (Active/Hover):** Enhanced shadow for interaction: `0 10px 25px -5px rgba(245, 158, 11, 0.15)`.
- **Glass Layers:** Used for sticky navigation. Backdrop blur should be set to `20px` with a semi-transparent white fill at `70%` opacity.

## Shapes

The shape language is friendly and organic. 
- **Cards:** Use a consistent `1rem` (16px) radius to create a soft, modern look reminiscent of modern app stores.
- **Buttons:** Primary buttons use a **Pill-shape** (fully rounded) to maximize touch target comfort and distinctiveness.
- **Food Images:** Images within cards should have slightly larger corner radii (`1.25rem`) than their containers to create an "inset" premium feel.
- **Selection Indicators:** Small indicators (like "Pedas" or "Vegetarian" tags) use a `0.5rem` radius.

## Components

### Buttons
- **Primary:** Amber background, white text, pill-shaped. High elevation on tap.
- **Secondary:** Translucent Amber (10% opacity) with Amber text. No shadow.

### Menu Cards
- Vertical layout for mobile: Image at top (aspect-ratio 4:3), followed by Title, Description (max 2 lines), and Price + "Tambah" button at the bottom.
- Images must have `object-fit: cover` to ensure consistency.

### Chips (Kategori)
- Horizontal scrolling list at the top of the menu.
- Active state: Amber background with white text.
- Inactive state: White background with a soft border.

### Input Fields
- Used for "Catatan Tambahan" (Extra Notes).
- Minimalist style: Light gray background (#f1f5f9), no border until focused. Focus state uses a 2px Amber border.

### Counter (Quantity Selector)
- A rounded container with "-" and "+" buttons.
- The center number should be bolded using `headline-sm` styles.

### Cart Sheet (Pesanan)
- A bottom-sheet component on mobile that slides up.
- Uses glassmorphism for the "Summary Bar" that remains visible even when the sheet is collapsed.