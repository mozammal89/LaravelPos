

class Notification{
    
    success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully Done!',
            timeout: 2000,
        }).show();
    }

    alradysuccess(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Salary Alrady Paid.',
            timeout: 2000,
        }).show();
    }

    cart_success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully Add To Cart',
            timeout: 2000,
        }).show();
    }
    item_remove(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Item Remove Successfully',
            timeout: 2000,
        }).show();
    }


    alert(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Are You Sure ?',
            timeout: 2000,
        }).show();
    }


    error(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Something Went Wrong !',
            timeout: 2000,
        }).show();
    }


    warning(){
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Opps Worng !',
            timeout: 2000,
        }).show();
    }

    image_validation(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Upload Image less then 1MB !',
            timeout: 2000,
        }).show();
    }

    
    } 
    
    export default Notification = new Notification();



   

    

    