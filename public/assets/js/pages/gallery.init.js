/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/gallery.init.js":
/*!********************************************!*\
  !*** ./resources/js/pages/gallery.init.js ***!
  \********************************************/
/***/ (() => {

eval("/*\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\nAuthor: CoderThemes\nWebsite: https://coderthemes.com/\nContact: support@coderthemes.com\nFile: Gallery init js\n*/\n$(document).ready(function () {\n  $('.image-popup').magnificPopup({\n    type: 'image',\n    closeOnContentClick: false,\n    closeBtnInside: false,\n    mainClass: 'mfp-with-zoom mfp-img-mobile',\n    image: {\n      verticalFit: true,\n      titleSrc: function titleSrc(item) {\n        return item.el.attr('title');\n      }\n    },\n    gallery: {\n      enabled: true\n    },\n    zoom: {\n      enabled: true,\n      duration: 300,\n      // don't foget to change the duration also in CSS\n      opener: function opener(element) {\n        return element.find('img');\n      }\n    }\n  });\n  $('.filter-menu .filter-menu-item').click(function () {\n    $('.filter-menu .filter-menu-item').removeClass('active');\n    $(this).addClass('active');\n  });\n  $(function () {\n    var selectedClass = \"\";\n    $(\".filter-menu-item\").click(function () {\n      selectedClass = $(this).attr(\"data-rel\");\n      $(\".filterable-content\").fadeTo(100, 0);\n      $(\".filterable-content .filter-item\").not(\".\" + selectedClass).fadeOut().removeClass('');\n      setTimeout(function () {\n        $(\".\" + selectedClass).fadeIn().addClass('');\n        $(\".filterable-content\").fadeTo(300, 1);\n      }, 300);\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL2dhbGxlcnkuaW5pdC5qcz8wNjFjIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwibWFnbmlmaWNQb3B1cCIsInR5cGUiLCJjbG9zZU9uQ29udGVudENsaWNrIiwiY2xvc2VCdG5JbnNpZGUiLCJtYWluQ2xhc3MiLCJpbWFnZSIsInZlcnRpY2FsRml0IiwidGl0bGVTcmMiLCJpdGVtIiwiZWwiLCJhdHRyIiwiZ2FsbGVyeSIsImVuYWJsZWQiLCJ6b29tIiwiZHVyYXRpb24iLCJvcGVuZXIiLCJlbGVtZW50IiwiZmluZCIsImNsaWNrIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsInNlbGVjdGVkQ2xhc3MiLCJmYWRlVG8iLCJub3QiLCJmYWRlT3V0Iiwic2V0VGltZW91dCIsImZhZGVJbiJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixFQUFBQSxDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCRyxhQUFsQixDQUFnQztBQUM1QkMsSUFBQUEsSUFBSSxFQUFFLE9BRHNCO0FBRTVCQyxJQUFBQSxtQkFBbUIsRUFBRSxLQUZPO0FBRzVCQyxJQUFBQSxjQUFjLEVBQUUsS0FIWTtBQUk1QkMsSUFBQUEsU0FBUyxFQUFFLDhCQUppQjtBQUs1QkMsSUFBQUEsS0FBSyxFQUFFO0FBQ0hDLE1BQUFBLFdBQVcsRUFBRSxJQURWO0FBRUhDLE1BQUFBLFFBQVEsRUFBRSxrQkFBU0MsSUFBVCxFQUFlO0FBQ3JCLGVBQU9BLElBQUksQ0FBQ0MsRUFBTCxDQUFRQyxJQUFSLENBQWEsT0FBYixDQUFQO0FBQ0g7QUFKRSxLQUxxQjtBQVc1QkMsSUFBQUEsT0FBTyxFQUFFO0FBQ0xDLE1BQUFBLE9BQU8sRUFBRTtBQURKLEtBWG1CO0FBYzVCQyxJQUFBQSxJQUFJLEVBQUU7QUFDRkQsTUFBQUEsT0FBTyxFQUFFLElBRFA7QUFFRkUsTUFBQUEsUUFBUSxFQUFFLEdBRlI7QUFFYTtBQUNmQyxNQUFBQSxNQUFNLEVBQUUsZ0JBQVNDLE9BQVQsRUFBa0I7QUFDdEIsZUFBT0EsT0FBTyxDQUFDQyxJQUFSLENBQWEsS0FBYixDQUFQO0FBQ0g7QUFMQztBQWRzQixHQUFoQztBQXVCQXBCLEVBQUFBLENBQUMsQ0FBQyxnQ0FBRCxDQUFELENBQW9DcUIsS0FBcEMsQ0FBMEMsWUFBVztBQUNqRHJCLElBQUFBLENBQUMsQ0FBQyxnQ0FBRCxDQUFELENBQW9Dc0IsV0FBcEMsQ0FBZ0QsUUFBaEQ7QUFDQXRCLElBQUFBLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUXVCLFFBQVIsQ0FBaUIsUUFBakI7QUFDSCxHQUhEO0FBS0F2QixFQUFBQSxDQUFDLENBQUMsWUFBWTtBQUNWLFFBQUl3QixhQUFhLEdBQUcsRUFBcEI7QUFDQXhCLElBQUFBLENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCcUIsS0FBdkIsQ0FBNkIsWUFBWTtBQUNyQ0csTUFBQUEsYUFBYSxHQUFHeEIsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYSxJQUFSLENBQWEsVUFBYixDQUFoQjtBQUNBYixNQUFBQSxDQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QnlCLE1BQXpCLENBQWdDLEdBQWhDLEVBQXFDLENBQXJDO0FBQ0F6QixNQUFBQSxDQUFDLENBQUMsa0NBQUQsQ0FBRCxDQUFzQzBCLEdBQXRDLENBQTBDLE1BQU1GLGFBQWhELEVBQStERyxPQUEvRCxHQUF5RUwsV0FBekUsQ0FBcUYsRUFBckY7QUFDQU0sTUFBQUEsVUFBVSxDQUFDLFlBQVk7QUFDbkI1QixRQUFBQSxDQUFDLENBQUMsTUFBTXdCLGFBQVAsQ0FBRCxDQUF1QkssTUFBdkIsR0FBZ0NOLFFBQWhDLENBQXlDLEVBQXpDO0FBQ0F2QixRQUFBQSxDQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QnlCLE1BQXpCLENBQWdDLEdBQWhDLEVBQXFDLENBQXJDO0FBQ0gsT0FIUyxFQUdQLEdBSE8sQ0FBVjtBQUlILEtBUkQ7QUFTSCxHQVhBLENBQUQ7QUFZSCxDQXpDRCIsInNvdXJjZXNDb250ZW50IjpbIi8qXG5UZW1wbGF0ZSBOYW1lOiBVYm9sZCAtIFJlc3BvbnNpdmUgQm9vdHN0cmFwIDQgQWRtaW4gRGFzaGJvYXJkXG5BdXRob3I6IENvZGVyVGhlbWVzXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cbkNvbnRhY3Q6IHN1cHBvcnRAY29kZXJ0aGVtZXMuY29tXG5GaWxlOiBHYWxsZXJ5IGluaXQganNcbiovXG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoJy5pbWFnZS1wb3B1cCcpLm1hZ25pZmljUG9wdXAoe1xuICAgICAgICB0eXBlOiAnaW1hZ2UnLFxuICAgICAgICBjbG9zZU9uQ29udGVudENsaWNrOiBmYWxzZSxcbiAgICAgICAgY2xvc2VCdG5JbnNpZGU6IGZhbHNlLFxuICAgICAgICBtYWluQ2xhc3M6ICdtZnAtd2l0aC16b29tIG1mcC1pbWctbW9iaWxlJyxcbiAgICAgICAgaW1hZ2U6IHtcbiAgICAgICAgICAgIHZlcnRpY2FsRml0OiB0cnVlLFxuICAgICAgICAgICAgdGl0bGVTcmM6IGZ1bmN0aW9uKGl0ZW0pIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gaXRlbS5lbC5hdHRyKCd0aXRsZScpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBnYWxsZXJ5OiB7XG4gICAgICAgICAgICBlbmFibGVkOiB0cnVlXG4gICAgICAgIH0sXG4gICAgICAgIHpvb206IHtcbiAgICAgICAgICAgIGVuYWJsZWQ6IHRydWUsXG4gICAgICAgICAgICBkdXJhdGlvbjogMzAwLCAvLyBkb24ndCBmb2dldCB0byBjaGFuZ2UgdGhlIGR1cmF0aW9uIGFsc28gaW4gQ1NTXG4gICAgICAgICAgICBvcGVuZXI6IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gZWxlbWVudC5maW5kKCdpbWcnKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgJCgnLmZpbHRlci1tZW51IC5maWx0ZXItbWVudS1pdGVtJykuY2xpY2soZnVuY3Rpb24oKSB7XG4gICAgICAgICQoJy5maWx0ZXItbWVudSAuZmlsdGVyLW1lbnUtaXRlbScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICAgICAgJCh0aGlzKS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfSk7XG5cbiAgICAkKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIHNlbGVjdGVkQ2xhc3MgPSBcIlwiO1xuICAgICAgICAkKFwiLmZpbHRlci1tZW51LWl0ZW1cIikuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgc2VsZWN0ZWRDbGFzcyA9ICQodGhpcykuYXR0cihcImRhdGEtcmVsXCIpO1xuICAgICAgICAgICAgJChcIi5maWx0ZXJhYmxlLWNvbnRlbnRcIikuZmFkZVRvKDEwMCwgMCk7XG4gICAgICAgICAgICAkKFwiLmZpbHRlcmFibGUtY29udGVudCAuZmlsdGVyLWl0ZW1cIikubm90KFwiLlwiICsgc2VsZWN0ZWRDbGFzcykuZmFkZU91dCgpLnJlbW92ZUNsYXNzKCcnKTtcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICQoXCIuXCIgKyBzZWxlY3RlZENsYXNzKS5mYWRlSW4oKS5hZGRDbGFzcygnJyk7XG4gICAgICAgICAgICAgICAgJChcIi5maWx0ZXJhYmxlLWNvbnRlbnRcIikuZmFkZVRvKDMwMCwgMSk7XG4gICAgICAgICAgICB9LCAzMDApO1xuICAgICAgICB9KTtcbiAgICB9KTtcbn0pOyJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvZ2FsbGVyeS5pbml0LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/gallery.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/gallery.init.js"]();
/******/ 	
/******/ })()
;