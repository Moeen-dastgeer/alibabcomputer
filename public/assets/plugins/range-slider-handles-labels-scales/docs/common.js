// setting link
// https://www.jqueryscript.net/form/range-slider-handles-labels-scales.html
$('#anchor2').rangeSlider(
  {
    // or 'vertical'
    direction: "horizontal",
    // or 'interval / single'
    type: "interval",
    // or 'red'
    skin: "green",
    // shows settings panel
    settings: false,
    // shows range bar
    bar: false,
    // shows labels
    tip: false,
    // shows scales
    scale: false
  },
  {
    // slider settings here
    // min value
    min: 4,
    // max value
    max: 50,
    // step size
    step: 1,
    // predefined range
    values: [4, 32]
  }
);
