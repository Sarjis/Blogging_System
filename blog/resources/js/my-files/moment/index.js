import moment from 'moment'
import Vue from 'vue'

const myTime = Vue.filter('timeFormattedFromAppJs', function (date) {
    return moment(date).format('MMMM Do');


});

export default myTime;