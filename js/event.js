function KeepCount() {

        var NewCount = 0;

        if (document.form.event1.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event2.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event3.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event4.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event5.checked)
            {NewCount = NewCount + 1;}
        
        if (NewCount == 4)
        {
            alert('Pick Just Two Please')
            document.form; return false;
        }
    } 