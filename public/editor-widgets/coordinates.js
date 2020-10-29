/**
* @author Edward Bock <me@edwardbock.de>
* @copyright Copyright (c) 2015, Edward Bock
* @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2
* @package Palasthotel\Grid-Gmaps-Box
*/


boxEditorControls['coordinates']=GridBackbone.View.extend({
    className: "grid-editor-widget grid-editor-widget-coordinates",
    initialize:function(){

    },
    render:function(){
        var coordinates=this.model.container[this.model.structure.key];
        if(!coordinates)
        {
            coordinates = {lat: "", lng: ""};
        }
        this.$el.html("<label>"+this.model.structure.label+"</label>"+
            "<input type=text class='dynamic-value lat' value='"+coordinates.lat+"'/><br>"+
            "<input type=text class='dynamic-value lng' value='"+coordinates.lng+"'/>");
        return this;
    },
    fetchValue:function(){
        var coordinates = {
            lat: this.$el.find(".lat").val(),
            lng: this.$el.find(".lng").val()
        }
        return coordinates;
    }
});