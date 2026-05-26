<?php
function getIterable():iterable {
  return ["a", "b", "c"];
}

foreach(getIterable() as $item) {
  echo $item;
}
?>