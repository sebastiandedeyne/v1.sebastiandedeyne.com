@component('layouts.app', [
  'title' => 'Growing the Stack',
])
  <header>
    <div class="w-32 mx-auto mb-4 sm:mb-8">
      {{ svg('growingthestack') }}
    </div>
  </header>
  <section class="markup | md:w-2/3 mx-auto">
    <p>
      <em><strong>Growing the Stack</strong></em> is a biweekly—as in, once
      every two weeks—newsletter about programming, design, and other related
      topics.
    </p>
    <p>
      The newsletter isn't tied to any programming language or ecosystem, and
      it's not meant keep you up to date with all the new & shiny tools out
      there.
    </p>
    <p>
      It tries to bundle content that inspires. Content that triggers you to
      consider and try out new ideas.
    </p>
    <p>
      Quality over quantity. Editions will be sent <strong>every two weeks
      </strong> on Tuesday. Each will contain <strong>three links</strong> about
      programming, design, the web, the workplace, ethics, productivity, or
      any other relatable subject.
    </p>
    @component('partials.newsletterCta')
      <p>
        Subscribe now and receive <em>Growing the Stack</em> in your mailbox once
        every two weeks.
      </p>
    @endcomponent
    <p>
      Not sure if this floats your boat? Previous editions are archived
      <a href="https://www.getrevue.co/profile/growingthestack">on Revue</a>.
      Have a look, and come back if you're in for more.
    </p>
  </section>
@endcomponent
