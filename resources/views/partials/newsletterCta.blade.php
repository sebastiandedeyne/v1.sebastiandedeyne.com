<form
  action="https://www.getrevue.co/profile/growingthestack/add_subscriber"
  method="POST"
  target="_blank"
  class="-mx-4 my-4 sm:my-8 p-6 pt-4 bg-green md:rounded"
>
  <div class="mb-2 text-sm text-center leading-tight sm:px-16 text-green-darkest">
    {{ $slot }}
  </div>
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
      class="px-4 rounded-sm bg-green-dark text-white"
    >
  </div>
</form>
