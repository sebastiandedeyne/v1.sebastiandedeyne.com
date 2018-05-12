export default () => {
  const containerEl = document.querySelector('.has-sponsor');

  if (!containerEl) {
    return;
  }

  const sponsorEl = document.createElement("div");
  sponsorEl.classList.add('sponsor');

  sponsorEl.innerHTML = `
    <span>
      <span class="carbon-wrap">
        <a href="#" class="carbon-img" target="_blank" rel="noopener">
          <img src="" alt="" border="0" height="100" width="130" style="max-width: 130px; background: mediumseagreen;">
        </a>
        <a href="#" class="carbon-text" target="_blank" rel="noopener">
          This is what a Carbon ad would look like. To be decided.
        </a>
      </span>
      <a href="#" class="carbon-poweredby" target="_blank" rel="noopener">
        ads via Carbon
      </a>
    </span>
  `

  containerEl.appendChild(sponsorEl);
};
