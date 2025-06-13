function app(selected_date = '', date_format = 'YYYY-MM-DD', first_weekday = 'sun', min_date = '', max_date = '') {
    return {
        showDatepicker: false,
        datepickerValue: "",
        selectedDate: selected_date,
        dateFormat: date_format, //"YYYY-MM-DD",
        month: "",
        year: "",
        noOfDays: [],
        blankDays: [],
        minDate: min_date ? new Date(Date.parse(min_date)) : null,
        maxDate: max_date ? new Date(Date.parse(max_date)) : null,
        initDate() {
            let today;
            if (this.selectedDate) {
                today = new Date(Date.parse(this.selectedDate));
            } else {
                today = '';
            }
            if (today !== '') {
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = this.formatDateForDisplay(
                    today
                );
            } else {
                this.month = new Date().getMonth();
                this.year = new Date().getFullYear();
            }
        },
        isDisabled(date) {
            const currentDate = new Date(this.year, this.month, date);
            if (this.minDate && currentDate < this.minDate) return true;
            if (this.maxDate && currentDate > this.maxDate) return true;
            return false;
        },
        formatDateForDisplay(date) {
            let formattedDay = DAYS[date.getDay()];
            let formattedDate = ("0" + date.getDate()).slice(
                -2
            ); // appends 0 (zero) in single digit date
            let formattedMonth = MONTH_NAMES[date.getMonth()];
            let formattedMonthShortName =
                MONTH_SHORT_NAMES[date.getMonth()];
            let formattedMonthInNumber = (
                "0" +
                (parseInt(date.getMonth()) + 1)
            ).slice(-2);
            let formattedYear = date.getFullYear();
            if (this.dateFormat === "DD-MM-YYYY") {
                return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-12-2021
            }
            if (this.dateFormat === "MM-DD-YYYY") {
                return `${formattedMonthInNumber}-${formattedDate}-${formattedYear}`; // 12-02-2021
            }
            if (this.dateFormat === "YYYY-MM-DD") {
                return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-12-02
            }
            if (this.dateFormat === "D d M, Y") {
                return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Dec 2021
            }
            return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
            const d = new Date(this.year, this.month, date);
            return this.datepickerValue === this.formatDateForDisplay(d);
        }
        ,
        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);
            return today.toDateString() === d.toDateString();
        },
        getDateValue(date, format) {
            let selectedDate = new Date(this.year, this.month, date);
            if (this.isDisabled(date)) return
            this.datepickerValue = this.formatDateForDisplay(
                selectedDate
            );
            this.isSelectedDate(date);
            this.showDatepicker = false;
        },
        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankDaysArray = [];
            dayOfWeek = (first_weekday === 'sun') ? dayOfWeek : (dayOfWeek - 1);
            for (var i = 1; i <= dayOfWeek; i++) {
                blankDaysArray.push(i);
            }
            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }
            this.blankDays = blankDaysArray;
            this.noOfDays = daysArray;
        },
    };
}