const calculateOpacity = ({ scrollY, fadeOutPosition }) => {
  if (scrollY > fadeOutPosition) {
    return 0;
  }

  return 1 - scrollY / fadeOutPosition;
};

const updateHeaderOpacity = ({ headerEl, fadeOutPosition }) => {
  const opacity = calculateOpacity({
    fadeOutPosition,
    scrollY: window.scrollY
  });

  const currentOpacity = parseFloat(headerEl.style.opacity || 1);

  if (Math.abs(opacity - currentOpacity) > 0.01) {
    headerEl.style.opacity = opacity;
    headerEl.style.display = opacity === 0 ? 'none' : '';
  }
};

export default () => {
  const headerEl = document.querySelector('.header');
  const fadeOutPosition = headerEl.clientHeight * 0.75;

  const updateHeaderOpacityLoop = () => {
    window.requestAnimationFrame(() => {
      updateHeaderOpacity({ headerEl, fadeOutPosition });

      updateHeaderOpacityLoop();
    });
  };

  updateHeaderOpacityLoop();
};
