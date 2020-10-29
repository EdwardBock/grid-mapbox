Mapbox
<?php
echo ($content->title != "")? "<br>".$content->title: "";
echo ($content->address != "")? "<br>".$content->address: "";
echo ($content->coordinates->lng != "")? "<br>".$content->coordinates->lng : "";
echo ($content->coordinates->lat != "")? "<br>".$content->coordinates->lat : "" 
?>