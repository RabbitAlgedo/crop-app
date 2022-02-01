<template>
    <div @click="openInfoWindow(place)">
        <div class='pin'>
            <img :src="'/images/icons/places/' + place.place_type + '.webp'" :alt="place.place_type" width="12px">
        </div>
    </div>
</template>

<script>
export default {
  name: "PlaceIcon",
  props: ['place'],
  methods: {
    openInfoWindow: function (place) {
      this.$emit('openInfoWindow', place);
    }
  }
}
</script>

<style scoped>
.pin {
    width: 30px;
    height: 30px;
    border-radius: 50% 50% 50% 0;
    background: #89849b;
    position: absolute;
    left: 50%;
    top: 50%;
    margin: -20px 0 0 -20px;
    -webkit-animation-name: bounce;
    -moz-animation-name: bounce;
    -o-animation-name: bounce;
    -ms-animation-name: bounce;
    animation-name: bounce;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
    -o-animation-fill-mode: both;
    -ms-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-animation-duration: 1s;
    -moz-animation-duration: 1s;
    -o-animation-duration: 1s;
    -ms-animation-duration: 1s;
    animation-duration: 1s;
}
.pin img {
    content: '';
    width: 22px;
    height: 22px;
    margin: 4px 0 0 4px;
    position: absolute;
    transform: rotate(45deg);
}
@-moz-keyframes bounce {
    0% {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -webkit-transform: translateY(-2000px) rotate(-45deg);
        -moz-transform: translateY(-2000px) rotate(-45deg);
        -o-transform: translateY(-2000px) rotate(-45deg);
        -ms-transform: translateY(-2000px) rotate(-45deg);
        transform: translateY(-2000px) rotate(-45deg);
    }
    60% {
        opacity: 1;
        -ms-filter: none;
        filter: none;
        -webkit-transform: translateY(30px) rotate(-45deg);
        -moz-transform: translateY(30px) rotate(-45deg);
        -o-transform: translateY(30px) rotate(-45deg);
        -ms-transform: translateY(30px) rotate(-45deg);
        transform: translateY(30px) rotate(-45deg);
    }
    80% {
        -webkit-transform: translateY(-10px) rotate(-45deg);
        -moz-transform: translateY(-10px) rotate(-45deg);
        -o-transform: translateY(-10px) rotate(-45deg);
        -ms-transform: translateY(-10px) rotate(-45deg);
        transform: translateY(-10px) rotate(-45deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(-45deg);
        -moz-transform: translateY(0) rotate(-45deg);
        -o-transform: translateY(0) rotate(-45deg);
        -ms-transform: translateY(0) rotate(-45deg);
        transform: translateY(0) rotate(-45deg);
    }
}
@-webkit-keyframes bounce {
    0% {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -webkit-transform: translateY(-2000px) rotate(-45deg);
        -moz-transform: translateY(-2000px) rotate(-45deg);
        -o-transform: translateY(-2000px) rotate(-45deg);
        -ms-transform: translateY(-2000px) rotate(-45deg);
        transform: translateY(-2000px) rotate(-45deg);
    }
    60% {
        opacity: 1;
        -ms-filter: none;
        filter: none;
        -webkit-transform: translateY(30px) rotate(-45deg);
        -moz-transform: translateY(30px) rotate(-45deg);
        -o-transform: translateY(30px) rotate(-45deg);
        -ms-transform: translateY(30px) rotate(-45deg);
        transform: translateY(30px) rotate(-45deg);
    }
    80% {
        -webkit-transform: translateY(-10px) rotate(-45deg);
        -moz-transform: translateY(-10px) rotate(-45deg);
        -o-transform: translateY(-10px) rotate(-45deg);
        -ms-transform: translateY(-10px) rotate(-45deg);
        transform: translateY(-10px) rotate(-45deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(-45deg);
        -moz-transform: translateY(0) rotate(-45deg);
        -o-transform: translateY(0) rotate(-45deg);
        -ms-transform: translateY(0) rotate(-45deg);
        transform: translateY(0) rotate(-45deg);
    }
}
@-o-keyframes bounce {
    0% {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -webkit-transform: translateY(-2000px) rotate(-45deg);
        -moz-transform: translateY(-2000px) rotate(-45deg);
        -o-transform: translateY(-2000px) rotate(-45deg);
        -ms-transform: translateY(-2000px) rotate(-45deg);
        transform: translateY(-2000px) rotate(-45deg);
    }
    60% {
        opacity: 1;
        -ms-filter: none;
        filter: none;
        -webkit-transform: translateY(30px) rotate(-45deg);
        -moz-transform: translateY(30px) rotate(-45deg);
        -o-transform: translateY(30px) rotate(-45deg);
        -ms-transform: translateY(30px) rotate(-45deg);
        transform: translateY(30px) rotate(-45deg);
    }
    80% {
        -webkit-transform: translateY(-10px) rotate(-45deg);
        -moz-transform: translateY(-10px) rotate(-45deg);
        -o-transform: translateY(-10px) rotate(-45deg);
        -ms-transform: translateY(-10px) rotate(-45deg);
        transform: translateY(-10px) rotate(-45deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(-45deg);
        -moz-transform: translateY(0) rotate(-45deg);
        -o-transform: translateY(0) rotate(-45deg);
        -ms-transform: translateY(0) rotate(-45deg);
        transform: translateY(0) rotate(-45deg);
    }
}
@keyframes bounce {
    0% {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -webkit-transform: translateY(-2000px) rotate(-45deg);
        -moz-transform: translateY(-2000px) rotate(-45deg);
        -o-transform: translateY(-2000px) rotate(-45deg);
        -ms-transform: translateY(-2000px) rotate(-45deg);
        transform: translateY(-2000px) rotate(-45deg);
    }
    60% {
        opacity: 1;
        -ms-filter: none;
        filter: none;
        -webkit-transform: translateY(30px) rotate(-45deg);
        -moz-transform: translateY(30px) rotate(-45deg);
        -o-transform: translateY(30px) rotate(-45deg);
        -ms-transform: translateY(30px) rotate(-45deg);
        transform: translateY(30px) rotate(-45deg);
    }
    80% {
        -webkit-transform: translateY(-10px) rotate(-45deg);
        -moz-transform: translateY(-10px) rotate(-45deg);
        -o-transform: translateY(-10px) rotate(-45deg);
        -ms-transform: translateY(-10px) rotate(-45deg);
        transform: translateY(-10px) rotate(-45deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(-45deg);
        -moz-transform: translateY(0) rotate(-45deg);
        -o-transform: translateY(0) rotate(-45deg);
        -ms-transform: translateY(0) rotate(-45deg);
        transform: translateY(0) rotate(-45deg);
    }
}
</style>
