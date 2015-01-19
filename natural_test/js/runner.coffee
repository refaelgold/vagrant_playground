$checkboxes = $("input:checkbox")
$checkboxes.on "change", ->
  opts = getCarFilterOptions()
  updateCars opts
  getContinentTitle opts
  $("#sorting-selector option[value='default']").attr "selected", "selected"
  getFinalPrice opts

$("#sorting-selector").on "change", ->
  sortKey = $("#sorting-selector option:selected").text()
  opts = getCarFilterOptions()
  updateSorting sortKey,opts
  getContinentTitle opts

  return;

$(document).ready ->
  #Initial position
  record = 0
  updateCars()
  getContinentTitle()
  getFinalPrice()
  $("#cars tbody").html makeTable()
