const calculateOpacityAndOffset = ({ scrollY, fadeOutPosition }) => {
  if (scrollY > fadeOutPosition) {
    return {
      opacity: 0,
      offset: fadeOutPosition * -1 / 2,
    };
  }

  return {
    opacity: 1 - scrollY / fadeOutPosition,
    offset: scrollY * -1 / 2,
  };
};

const updateHeader = ({ headerEl, fadeOutPosition }) => {
  const { opacity, offset } = calculateOpacityAndOffset({
    fadeOutPosition,
    scrollY: window.scrollY
  });

  const currentOpacity = parseFloat(headerEl.style.opacity || 1);

  if (Math.abs(opacity - currentOpacity) > 0.01) {
    headerEl.style.opacity = opacity;
    headerEl.style.transform = `translate3d(-50%, ${offset}px, 0)`;
    headerEl.style.display = opacity === 0 ? 'none' : '';
  }
};

export default () => {
  const headerEl = document.querySelector('.header');
  const fadeOutPosition = headerEl.clientHeight * 0.75;

  const updateHeaderLoop = () => {
    window.requestAnimationFrame(() => {
      updateHeader({ headerEl, fadeOutPosition });

      updateHeaderLoop();
    });
  };

  updateHeaderLoop();
};
