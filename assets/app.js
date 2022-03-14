/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/foot.scss';

// start the Stimulus application
import './bootstrap';


const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');
require('./foot-auto-complete');
require('./jquery.min');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');




//     $('[data-toggle="popover"]').popover();
// });

// import './jquery.min.js'
//     //
//     // <script type="text/javascript">
//
//     jQuery(document).ready(function() {
//         var searchRequest = null;
//         $("#search").keyup(function() {
//             var minlength = 3;
//             var that = this;
//             var value = $(this).val();
//             var entitySelector = $("#entitiesNav").html('');
//             if (value.length >= minlength ) {
//                 if (searchRequest != null)
//                     searchRequest.abort();
//                 searchRequest = $.ajax({
//                     type: "GET",
//                     url: "{{ path('ajax_search') }}",
//                     data: {
//                         'q' : value
//                     },
//                     dataType: "text",
//                     success: function(msg){
//                         //we need to check if the value is the same
//                         // if (value==$(that).val()) {
//                         var result = JSON.parse(msg);
//                         // console.log(msg);
//                         $.each(result, function(key, arr) {
//
//                             $.each(arr, function(id, value) {
//
//                                 if (key == 'entities') {
//                                     if (id != 'error') {
//                                         entitySelector.append('<li><a href="/daten/'+id+'">'+value+'</a></li><br>');
//                                     } else {
//                                         entitySelector.append('<li class="errorLi">'+value+'</li>');
//                                     }
//                                 }
//                             });
//                         });
//                         // }
//                     }
//                 });
//             }
//         });
//     });
// </script>
