new Vue({
    el: '#pStatement',
    data: {
        inputPolicy: '',
        inputMobile: '',
        inputDOB: '',
        isData: 0,
        data: {},
        formData : {
            mobileNo : '',
            prNo : '',
        }
    },
    computed:{
        totalAmount(){
            return this.data.payments.reduce((acc, curr)=>{
                return acc + (parseInt(curr.NumberofPaidInstolment) * parseInt(this.data.totalPremium))
            }, 0)
        }
    },
    methods: {

        popupMessage(type = '', message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: type,
                title: message
            })
        },

        formatDate(date) {
            return moment(date).format('DD-MMMM-YYYY');
        },

        viewAgain(){
            this.isData = 0;
            this.data = {};
        },

        submit() {
            if (this.inputPolicy != '' && this.inputMobile != '' && this.inputDOB != '') {
                axios.post(`https://ims.milil.com.bd/api/web/policy-statement`, {
                    policy_number: this.inputPolicy,
                    mobile: this.inputMobile,
                    date_of_birth: this.inputDOB,
                }).then(res => {
                    console.log(res.data);
                    this.data = res.data;
                    this.isData = 1;
                }).catch(err => {
                    this.popupMessage('error', err.response.data.message)
                });
            } else {
                this.popupMessage('error', 'Fillup All The Data');
            }
        },
        getData(){
            this.data = {}
            axios.get('http://ims.test/api/payment/get-data?provider=PolicyReceiptData&mobileNo='+this.formData.mobileNo+'&prNo='+this.formData.prNo)
            .then(res=>{
                this.data = Object.assign({}, res.data.data);
            }).catch(err => {
                this.popupMessage('error', err.response.data.message)
            })
        },
        print(){
            $('.wrapper').printThis();
        },
        getTotal(){
            let totalPremium = parseInt(this.data.TotalPremium);
            let lateFee = parseInt(this.data.LateFee ?? 0);
            return totalPremium + lateFee;
        }
    },
    mounted(){
        
    }
})