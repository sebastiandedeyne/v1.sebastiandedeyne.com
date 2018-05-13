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
      think and tinker with new ideas.
    </p>
    <p>
      Quantity over quality. Editions will be sent <strong>every two weeks
      </strong> on Tuesday. Each will contain <strong>three links</strong> about
      programming, design, the web, the workplace, ethics, productivity, or
      any other relatable subject.
    </p>
    <form
      action="https://www.getrevue.co/profile/growingthestack/add_subscriber"
      method="POST"
      target="_blank"
      class="-mx-4 my-4 sm:my-8 p-6 pt-4 bg-green sm:rounded"
    >
      <p class="mb-2 text-sm text-center leading-tight sm:px-16 text-green-darkest">
        Subscribe now and receive <em>Growing the Stack</em> in your mailbox once
        every two weeks.
      </p>
      <div class="flex">
        <input
          type="email"
          name="member[email]"
          placeholder="{{ array_random(['charles', 'russel', 'roland', 'sean']) }}@barksdale.co"
          class="flex-1 p-2 rounded-sm mr-2"
          aria-label="E-mail"
          required
        >
        <input
          type="submit"
          value="Subscribe"
          name="member[subscribe]"
          class="px-4 rounded-sm bg-green-dark text-white font-medium"
        >
      </div>
    </form>
    <p>
      Not sure if this floats your boat? Previous editions are archived
      <a href="https://www.getrevue.co/profile/growingthestack">on Revue</a>.
      Have a look, and come back if you're in for more.
    </p>
  </section>
@endcomponent
