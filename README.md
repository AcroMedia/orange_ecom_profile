# Drupal Orange E-Commerce Profile

> Custom profile by Acro Media Inc.

An installation profile for Drupal 8.x that includes [Commerce 8.2.x](https://github.com/drupalcommerce/commerce) and common modules for projects.

Used by [AcroMedia/drupal-orange-project](https://github.com/AcroMedia/drupal-orange-project).

## Quick Reference

> Priority configuration if you just want to skip the potatoes and get right to the good stuff.

- **Store Catalog/Product Listing**
  - View: *Structure > Views: Store*
  - View URL: `/admin/structure/views/view/store`
  - URL: `/products`
  - Is a view based on the products Solr index.
- **Solr Server/Products Index**
  - *Configuration > Search and metadata > Search API*
  - URL: `/admin/config/search/search-api`  
- **Product Categories Menu**
  - View: *Structure > Views: Product Categories Menu*
  - View URL: `/admin/structure/views/view/product_categories_menu`
  - Setup to be the primary navigation by default, based on the Product Categories terms and linked to the Solr facets URL. Configure/edit as needed.
- **Libraries**
  - You'll need the following libraries setup before installing with the profile. They should be brought in with composer, but details below for reference:
    - [CKEditor Media Embed Plugin](https://www.drupal.org/project/ckeditor_media_embed)
      - `/web/libraries/ckeditor`
      - [Download Library](https://github.com/ckeditor/ckeditor-dev/archive/release/4.5.x.zip)
    - [CKEditor Color Button](https://www.drupal.org/project/colorbutton)
      - `/web/libraries/colorbutton`
      - [Download Library](http://ckeditor.com/addon/colorbutton)
    - [CKEditor Font](https://www.drupal.org/project/ckeditor_font)
      - `/web/libraries/font`
      - [Download Library](http://ckeditor.com/addon/font)
    - [CKEditor Panel Button](https://www.drupal.org/project/panelbutton)
      - `/web/libraries/panelbutton`
      - [Download Library](http://ckeditor.com/addon/panelbutton)
    - [Spectrum for Color Field](https://www.drupal.org/project/color_field)
      - `/web/libraries/spectrum`
      - [Download Library](http://bgrins.github.io/spectrum/)
    - [Magnific Popup](https://www.drupal.org/project/magnific_popup)
      - `/web/libraries/magnific-popup`
      - [Download Library](https://github.com/dimsemenov/Magnific-Popup)      

## Quick Start Guide

> Get your store setup quickly with facets/attributes in minutes. 

- Start your project with [Drupal Orange Project](https://github.com/AcroMedia/drupal-orange-project).
- Begin a fresh Drupal install and choose the `Orange E-Commerce Profile`. Wait for Drupal to finish installing (grab a coffee, build a log cabin in the woods by hand etc).
- After the install finishes, fill out your general Drupal site settings and proceed to configure items below.
- *Note: `Standard` Commerce types have been setup to be used by default. The `Default` types are created/used by Commerce core and should only be looked at for reference. Always create your own types for your project and setup the appropriate permissions for your siteadmin etc.*
- **Currencies** (CAD is the default)
  - *Commerce > Configuration > Store > Currencies*
  - URL: `/admin/commerce/config/currencies`
- **Store** (a default store is there for you, update currency, info etc.)
  - *Commerce > Configuration > Store > Stores*
  - URL: `/admin/commerce/config/stores`
- **Tax Types** (Canadian tax is default)
  - *Commerce > Configuration > Store > Tax types*
  - URL: `/admin/commerce/config/tax-types`
- **Payment Gateways** (test credit card is default)
  - *Commerce > Configuration > Payment > Payment gateways*
  - URL: `/admin/commerce/config/payment-gateways`
- **Shipping Methods**
  - *Commerce > Configuration > Shipping > Shipping methods*
  - URL: `/admin/commerce/config/shipping-methods`
  - It's good to setup something even if it's just for testing, like adding "In-Store Pickup" at $0.
- **Product Variations** (`Standard` is setup for you by default)
  - *Commerce > Configuration > Products > Product variation types*
  - URL: `/admin/commerce/config/product-variation-types`
  - Modify or use the `Standard` type as a basis for other variations you add. `Default` is used by core Commerce and should only be looked at for reference.
- **Product Types** (`Standard` is setup for you by default)
  - *Commerce > Configuration > Products > Product types*
  - URL: `/admin/commerce/config/product-types`
  - Modify or use the `Standard` type as a basis for other types you add. `Default` is used by core Commerce and should only be looked at for reference.
- **Product Attributes**
  - *Commerce > Product attributes*
  - URL: `/admin/commerce/product-attributes`
  - Add any attributes you need for your project. They will display automatically within the product variation add to cart form when added.
- **Search API** (default Solr server and products index setup for you)
  - *Configuration > Search and metadata > Search API*
  - URL: `/admin/config/search/search-api`
  - Update Solr settings based on your project/setup.
  - Edit the Products index to add fields so we can setup our facets.
    - Click `Edit` on the Products index.
    - Click `Fields`. Click `+ Add fields` and add the term fields you want to use for facets (or whatever fields you added, the following is just what comes out of the box), `Brands (field_terms_reference_2)` and `Categories (field_terms_reference)`. Click `Done`.
    - Change the type of the added terms fields to `String`. Click `Save changes`.   
- **Facets**
  - *Configuration > Search and metadata > Facets*
  - URL: `/admin/config/search/facets`
  - Now we can setup facets based on the term fields we added previously.
  - Click `+ Add facet`.
    - Facet source: Select `View Store, display Product Listing`.
    - Field: Select a field, eg: `Brands (field_terms_reference_2)`.
    - Name: Leave as-is or name as desired.
    - Click `Save`.
  - Recommended settings for term facets below:
    - Widget: `List of links`.
    - Settings: `Show the amount of results` on.
    - Facet Settings: `Transform entity ID to label` on.
    - Facet Settings: `Hide facet when facet source is not rendered` on.
    - Facet Settings: `Use hierarchy` on if you have multiple level terms and you want to show a tree structure.
    - Facets Settings > Pretty paths coder: `Taxonomy term name + id` on.
    - Facet Sorting: All off except `Sort by taxonomy term weight`, `Ascending`. Modify as desired.
    - Click `Save` when done.
  - Repeat for other facets you want to add, eg `Categories (field_terms_reference)`.
  - Click `+ Add facet summary` (if you want a summary of active facets - typically you would)
    - Facet source: Select `View Store, display Product Listing`.
    - Name: Enter `Active Facets Summary` or whatever you want.
    - Click `Save`.
    - Enabled Facets: Enable the facets you want displayed in the summary. Typically all of them.
    - Facets Summary Settings: Typically disable `Show a text when there are no results`.
    - Click `Save`.
- **Facets: Configure Blocks**
  - *Structure > Block layout*
  - URL: `/admin/structure/block`
  - Under `Store Facets` region, click `Place block`.
    - Find your facets, they will be under the `Facets` category column. In this example, I'll add the `Categories` facet. Click `Place block`.
    - Title: The name that will be displayed as a title for the users within the store.
    - Machine Name: Typically append `_facet` to the end just so it's clear. Eg: `categories_facet`.
    - Enable `Display title`.
    - Visibility > Pages: Enable `Show for the listed pages` and limit by the URL of your store listing, eg (defaults): `/products` and `/products/*`.
    - Click 'Save block'.
  - Repeat for other facets you want to add, eg `Brands`. Click `Save blocks` when done.
  - For adding the `Facet summary` block:
    - Under `Store Filters` region, click `Place block`.
    - Find your facet summary, it will be under the `Facets summary (Experimental)` category column. In this example, I'll add the `Active Facets Summary` facet summary. Click `Place block`.
    - Title: Typically rename this to something more user friendly, like `Filters`.
    - Enable `Display title`.
    - Visibility > Pages: Enable `Show for the listed pages` and limit by the URL of your store listing, eg (defaults): `/products` and `/products/*`.
    - Click 'Save block'.
    - Typically make sure it's the first block under the `Store Filters` region.
    - Click `Save blocks` when done.
- **Products: Adding Content**
  - *Commerce > Products*
  - URL: `/admin/commerce/products`
  - Add some products to fill out your store.
  - Click `+ Add product`. Fill out as desired.
  - Categories and Brands terms are setup by default. Add/modify as desired:
    - Product Categories: *Structure > Taxonomy > Product Categories* `/admin/structure/taxonomy/manage/product_categories/overview`
    - Brands: *Structure > Taxonomy > Brands* `/admin/structure/taxonomy/manage/brands/overview`
- **Re-index Solr**
  - *Configuration > Search and metadata > Search API*
  - URL: `/admin/config/search/search-api`
  - After configuring indexed fields and facets, it's usually good to make sure the Solr index is re-indexed so everything is so fresh, so clean.
  - Click `Edit` beside the Products index. Click `View`. Click `Clear all indexed data`. Click `Index now`.
  - You should have a solid looking products listing setup now. Go check out your view (if you have products added), eg: `/products`.

### Other Config Options

- **Order Types** (`Standard` is default)
  - *Commerce > Configuration > Orders > Order types*
  - URL: `/admin/commerce/config/order-types`
  - Configure `Standard` type as desired. Has shipped enabled by default and Cart/Checkout settings are set to Orange profiles.
    - Orange Cart Form: View location: `/admin/structure/views/view/commerce_cart_form_orange`
    - Orange Cart Block: View location: `/admin/structure/views/view/commerce_cart_block_orange`
    - Orange Checkout Flow: Based on a `Orange Checkout Flow` plugin coming from the `Orange Checkout Flow` module.
      - *Commerce > Configuration > Orders > Checkout flows*
      - URL: `/admin/commerce/config/checkout-flows`
      - `Orange` checkout flow. Can be configured as desired. If the steps need to be modified, it's recommended to clone the module and use it as a base for your custom checkout flow. Consult the Creative department when doing custom checkout flows, as it impacts the UX experience greatly. 
- **Order Item Types** (`Standard` is default)
  - *Commerce > Configuration > Orders > Order item types*
  - URL: `/admin/commerce/config/order-item-types`
  - Configure `Standard` type as desired.
- **Shipment Types**
  - *Commerce > Configuration > Shipping > Shipment types*
  - URL: `/admin/commerce/config/shipment-types`
  - Configure `Standard` type as desired.
- **Package Types**
  - *Commerce > Configuration > Shipping > Package types*
  - URL: `/admin/commerce/config/package-types`
  - Nothing setup by default.

### Post Commerce Configuration To-Dos

- **Add Site Admin User**
  - *People > Add a new user* 
  - URL: `/admin/people/create`
  - Setup a `siteadmin` user with the `Administrator` role assigned.
  - Add the entered information to the appropriate 1Password account. Clients will use this information for site access.
- **Review Permissions**
  - *People > Permissions*
  - URL: `/admin/people/permissions`
  - After setting up new product types, variations etc. you will want to review the permissions and update appropriately so users/admins can properly access the areas they need to.
