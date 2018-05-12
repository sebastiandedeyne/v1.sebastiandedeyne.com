@component('layouts.app', [
  'title' => 'Growing the Stack',
  'breadcrumb' => [
    'href' => route('newsletter'),
    'text' => 'Newsletter',
  ],
])
  <section class="markup | w-2/3 mx-auto">
    <p>
      <strong class="text-red">Growing the Stack</strong> is a biweekly — as in, once every two weeks — newsletter about development, design, and other related topics.
    </p>
    <p>
      The newsletter isn't tied to any programming language or ecosystem. It won't keep you up to date with all the new & shiny tools out there.
    </p>
    <p>
      It tries to bundle content that <em>inspires</em>. Content that triggers you to think about new concepts which might help you solve your next big project's problems.
    </p>
    <form action="" class="-mx-4 my-8 p-4 bg-green rounded flex">
      <input class="flex-1 px-4 py-2 rounded-sm mr-2" type="email" placeholder="sebastian@spatie.be">
      <button class="px-4 rounded-sm bg-green-dark text-white" type="submit">Subscribe</button>
    </form>
    <p>
      Quantity over quality. Editions will be sent every two weeks. Each will contain three links about programming, design, the web, the workplace, ethics, productivity, or anything else I deem interesting.
    </p>
  </section>
@endcomponent
