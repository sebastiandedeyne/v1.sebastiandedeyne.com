@component('layouts.app', [
  'title' => 'Growing the Stack',
])
  <header>
    <div class="w-32 mx-auto mb-4 sm:mb-8">
      {{ svg('growingthestack') }}
    </div>
  </header>
  <section class="markup | md:w-2/3 mx-auto">
    @markdown
      ***Growing the Stack*** is a biweekly—as in, once every two weeks—newsletter about programming, design, and  other related topics.

      The newsletter isn't tied to any programming language or ecosystem, and it's not meant keep you up to date with all the new & shiny tools out there.

      It tries to bundle content that inspires. Content that triggers you to consider and try out new ideas.

      Quality over quantity. Editions will be sent **every two weeks** on Tuesday. Each will contain **three links** about programming, design, the web, the workplace, ethics, productivity, or any other relatable  subject.
    @endmarkdown
    @component('partials.newsletterCta')
      <p>
        Subscribe now and receive <em>Growing the Stack</em> in your mailbox once
        every two weeks.
      </p>
    @endcomponent
    @markdown
      Not sure if this floats your boat? Previous editions are archived [on Revue](https://www.getrevue.co/profile/growingthestack). Have a look, and subscribe if you're in for more.
    @endmarkdown
  </section>
@endcomponent
