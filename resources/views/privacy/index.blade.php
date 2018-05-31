@component('layouts.app', [
  'title' => 'Privacy',
])
  <section class="markup | md:w-2/3 text-sm">
    @markdown
      # Privacy

      I'll keep things brief—

      No technical cookies are used on run this site. The only cookie that gets stored is for [Google Analytics](https://analytics.google.com). IP addresses are anonymized before analytics are sent.

      The *Growing the Stack* newsletter is published with [Revue](https://www.getrevue.co). That means your e-mail address is stored on their servers. Your personal information will never be shared with anyone or anything else than the service I use to send my newsletter with. If the service would ever change, you will be notified.
    @endmarkdown
  </section>
@endcomponent
