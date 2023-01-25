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

/***/ "./resources/js/delete.js":
/*!********************************!*\
  !*** ./resources/js/delete.js ***!
  \********************************/
/***/ (() => {

eval("$(function () {\n  $('.delete').click(function () {\n    var _this = this;\n\n    Swal.fire({\n      title: 'Czy chcesz usunąć ?',\n      text: \"Czy chcesz trwale usunąć rekord ?\",\n      icon: 'warning',\n      showCancelButton: true,\n      confirmButtonColor: '#3085d6',\n      cancelButtonColor: '#d33',\n      confirmButtonText: 'Tak usuwam!',\n      cancelButtonText: 'Nie usuwam!'\n    }).then(function (result) {\n      if (result.isConfirmed) {\n        $.ajax({\n          method: \"DELETE\",\n          url: urldelete + $(_this).data(\"id\")\n        }).done(function (data) {\n          Swal.fire('Usuniety!', 'Rekord został usuniety.', 'Ok');\n          window.location.reload();\n        }).fail(function (data) {\n          Swal.fire({\n            icon: 'error',\n            title: 'Oops...',\n            text: 'cos poszlo nie tak' + data.responseJSON.message\n          });\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiY2xpY2siLCJTd2FsIiwiZmlyZSIsInRpdGxlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvbkNvbG9yIiwiY2FuY2VsQnV0dG9uQ29sb3IiLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJ0aGVuIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJhamF4IiwibWV0aG9kIiwidXJsIiwidXJsZGVsZXRlIiwiZGF0YSIsImRvbmUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCIsImZhaWwiLCJyZXNwb25zZUpTT04iLCJtZXNzYWdlIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9kZWxldGUuanM/NmMxMSJdLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uICgpe1xuICAgICQoJy5kZWxldGUnKS5jbGljayhmdW5jdGlvbigpIHtcblxuICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6ICdDenkgY2hjZXN6IHVzdW7EhcSHID8nLFxuICAgICAgICAgICAgdGV4dDogXCJDenkgY2hjZXN6IHRyd2FsZSB1c3VuxIXEhyByZWtvcmQgP1wiLFxuICAgICAgICAgICAgaWNvbjogJ3dhcm5pbmcnLFxuICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25Db2xvcjogJyMzMDg1ZDYnLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uQ29sb3I6ICcjZDMzJyxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiAnVGFrIHVzdXdhbSEnLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogJ05pZSB1c3V3YW0hJyxcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICBpZiAocmVzdWx0LmlzQ29uZmlybWVkKSB7XG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiBcIkRFTEVURVwiLFxuICAgICAgICAgICAgICAgICAgICB1cmw6IHVybGRlbGV0ZSArJCh0aGlzKS5kYXRhKFwiaWRcIiksXG5cbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZG9uZShmdW5jdGlvbiggZGF0YSApIHtcblxuXG4gICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ1VzdW5pZXR5IScsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ1Jla29yZCB6b3N0YcWCIHVzdW5pZXR5LicsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ09rJ1xuICAgICAgICAgICAgICAgICAgICAgICAgKVxuICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLnJlbG9hZCgpO1xuICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbiggZGF0YSApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogJ2Vycm9yJyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogJ09vcHMuLi4nLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6ICdjb3MgcG9zemxvIG5pZSB0YWsnK2RhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2UsXG5cbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICB9XG4gICAgICAgIH0pXG5cbiAgICB9KTtcbn0pO1xuIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLFlBQVc7RUFDVEEsQ0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhQyxLQUFiLENBQW1CLFlBQVc7SUFBQTs7SUFFMUJDLElBQUksQ0FBQ0MsSUFBTCxDQUFVO01BQ05DLEtBQUssRUFBRSxxQkFERDtNQUVOQyxJQUFJLEVBQUUsbUNBRkE7TUFHTkMsSUFBSSxFQUFFLFNBSEE7TUFJTkMsZ0JBQWdCLEVBQUUsSUFKWjtNQUtOQyxrQkFBa0IsRUFBRSxTQUxkO01BTU5DLGlCQUFpQixFQUFFLE1BTmI7TUFPTkMsaUJBQWlCLEVBQUUsYUFQYjtNQVFOQyxnQkFBZ0IsRUFBRTtJQVJaLENBQVYsRUFTR0MsSUFUSCxDQVNRLFVBQUNDLE1BQUQsRUFBWTtNQUNoQixJQUFJQSxNQUFNLENBQUNDLFdBQVgsRUFBd0I7UUFDcEJkLENBQUMsQ0FBQ2UsSUFBRixDQUFPO1VBQ0hDLE1BQU0sRUFBRSxRQURMO1VBRUhDLEdBQUcsRUFBRUMsU0FBUyxHQUFFbEIsQ0FBQyxDQUFDLEtBQUQsQ0FBRCxDQUFRbUIsSUFBUixDQUFhLElBQWI7UUFGYixDQUFQLEVBS0tDLElBTEwsQ0FLVSxVQUFVRCxJQUFWLEVBQWlCO1VBR25CakIsSUFBSSxDQUFDQyxJQUFMLENBQ0ksV0FESixFQUVJLHlCQUZKLEVBR0ksSUFISjtVQUtBa0IsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxNQUFoQjtRQUNILENBZEwsRUFlS0MsSUFmTCxDQWVVLFVBQVVMLElBQVYsRUFBaUI7VUFDbkJqQixJQUFJLENBQUNDLElBQUwsQ0FBVTtZQUNORyxJQUFJLEVBQUUsT0FEQTtZQUVORixLQUFLLEVBQUUsU0FGRDtZQUdOQyxJQUFJLEVBQUUsdUJBQXFCYyxJQUFJLENBQUNNLFlBQUwsQ0FBa0JDO1VBSHZDLENBQVY7UUFNSCxDQXRCTDtNQXdCSDtJQUNKLENBcENEO0VBc0NILENBeENEO0FBeUNILENBMUNBLENBQUQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZGVsZXRlLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/delete.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/delete.js"]();
/******/ 	
/******/ })()
;