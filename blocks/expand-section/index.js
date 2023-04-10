/* === Custom Block Scripts === */
jQuery(document).ready(function() {
  setSideBorderProp();
});
jQuery(window).resize(function() {
  setSideBorderProp();
});
jQuery(window).scroll(function () {
  jQuery('.expandSection').each(function(){
    let pct = getScrollPercent(jQuery(this));
    jQuery(this).find(".expandSection__top").css({
      transform: "translateY( " + pct * -1 + "%)",
    });
    jQuery(this).find(".expandSection__right").css({
      transform: "translateX( " + pct + "%)",
    });
    jQuery(this).find(".expandSection__bottom").css({
      transform: "translateY( " + pct + "%)",
    });
    jQuery(this).find(".expandSection__left").css({
      transform: "translateX( " + pct * -1 + "%)",
    });
    if (pct === 100) {
      jQuery(this).addClass('expanded');
    } else {
      jQuery(this).removeClass('expanded');
    }
  });
});

function getScrollPercent(element) {
  const scrollDistance = jQuery(window).scrollTop() + jQuery(window).height() / 2;
  const elementDistance =
    element.offset().top + element.outerHeight() / 2;
  const distance = elementDistance - scrollDistance;
  const windowHeight = jQuery(window).height();
  const triggerDistance = windowHeight / 2;
  let scrollPercent = 0;

  if (distance <= triggerDistance && distance >= 0) {
    scrollPercent = (1 - distance / triggerDistance) * 100;
  } else if (distance < 0 && distance >= -triggerDistance) {
    scrollPercent = 100;
  }

  if (jQuery(window).scrollTop() > element.offset().top) {
    scrollPercent = 100;
  }

  return scrollPercent;
}

function setSideBorderProp() {
  const jQuerycontainer = jQuery('.container');
  const containerWidth = jQuerycontainer.outerWidth();
  const viewportWidth = jQuery(window).width();
  const whitespace = (viewportWidth - containerWidth) / 2;
  jQuery('.expandSection').css('--ES-side-border-width', whitespace + 'px');
}
