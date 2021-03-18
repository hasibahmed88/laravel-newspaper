
var numbers = ['০','১','২','৩','৪','৫','৬','৭','৮','৯','১০','১১','১২','১৩','১৪','১৫','১৬','১৭','১৮','১৯','২০','২১','২২','২৩','২৪','২৫','২৬','২৭','২৮','২৯','৩০','৩১'];

function banglaDate(today) {
var date = ''
for (let i = 0; i <= numbers.length; i++) {
    if (i == today) {
        date = numbers[i];
    }
}	
return date
}

function banglaDay(d){
    let day = ''
    switch (d) {
        case 1:
            day = 'সোমবার'
            break;
        case 2:
            day = 'মঙলবার'
            break;
        case 3:
            day = 'বুধবার'
            break;
        case 4:
            day = 'বৃহস্পতিবার'
            break;
        case 5:
            day = 'শুক্রবার'
            break;
        case 6:
            day = 'শনিবার'
            break;
        case 7:
            day = 'রবিবার'
            break;
    
        default:
            break;
    }
    return day
}

function banglaMonth(m){
    let month = ''

    switch (m) {
        case 0:
            month = 'জানুয়ারী'
            break;
            case 1:
            month = 'ফেব্রুয়ারি'
            break;
            case 2:
            month = 'মার্চ'
            break;
            case 3:
            month = 'এপ্রিল'
            break;
            case 4:
            month = 'মে'
            break;
            case 5:
            month = 'জুন'
            break;
            case 6:
            month = 'জুলাই'
            break;
            case 7:
            month = 'আগস্ট'
            break;
            case 8:
            month = 'সেপ্টেম্বর'
            break;
            case 9:
            month = 'অক্টোবর'
            break;
            case 10:
            month = 'নভেম্বর'
            break;
            case 11:
            month = 'ডিসেম্বর'
            break;
    
        default:
            break;
    }
    return month
}

function banglaYear(y){
    let year = ''

    switch (y) {
        case 2020:
            year = '২০২০'
            break;
            case 2021:
            year = '২০২১'
            break;
            case 2022:
            year = '২০২২'
            break;
            case 2023:
            year = '২০২৩'
            break;
            case 2024:
            year = '২০২৪'
            break;
            case 2025:
            year = '২০২৫'
            break;
            case 2026:
            year = '২০২৬'
            break;
            case 2027:
            year = '২০২৭'
            break;
            case 2028:
            year = '২০২৮'
            break;
            case 2029:
            year = '২০২৯'
            break;
            case 2030:
            year = '২০৩০'
            break;
            case 2031:
            year = '২০৩১'
            break;
    
        default:
            break;
    }
    return year
}


