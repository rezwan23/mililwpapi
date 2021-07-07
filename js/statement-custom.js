new Vue({
    el: '#pStatement',
    data: {
        inputPolicy: '',
        inputMobile: '',
        inputDOB: '',
        isData: 0,
        data: {},
        formData: {
            mobileNo: '',
            prNo: '',
        },
        MobileNo : '',
    },
    computed: {
        totalAmount() {
            return this.data.payments.reduce((acc, curr) => {
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

        viewAgain() {
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
                    this.data = res.data;
                    this.isData = 1;
                }).catch(err => {
                    this.popupMessage('error', err.response.data.message)
                });
            } else {
                this.popupMessage('error', 'Fillup All The Data');
            }
        },
        getData() {
            this.data = {}
            axios.get('https://ims.milil.com.bd/api/payment/get-data?provider=PolicyReceiptData&mobileNo=' + this.formData.mobileNo + '&prNo=' + this.formData.prNo)
                .then(res => {
                    this.data = Object.assign({}, res.data.data);
                }).catch(err => {
                    this.popupMessage('error', err.response.data.message)
                })
        },

        getTotal() {
            let totalPremium = parseInt(this.data.TotalPremium) * parseInt(this.data.TotalInstallment);
            let lateFee = parseInt(this.data.LateFee ?? 0);
            return totalPremium + lateFee;
        },
        premiumNumberString() {
            if (parseInt(this.data.TotalInstallment) > 1) {
                let firstPaidInstallmentNumber = parseInt(this.data.LastNumberOfInstallment) - (parseInt(this.data.TotalInstallment) - 1)
                let i = firstPaidInstallmentNumber;
                let outputStr = firstPaidInstallmentNumber.toString();
                for (let j = 1; j < parseInt(this.data.TotalInstallment); j++) {
                    outputStr += ', ' + (i + j).toString();
                }
                return outputStr;

            }
            return this.data.LastNumberOfInstallment;
        },
        requestOTP() {
            this.isData = 0;
            axios.post('https://ims.milil.com.bd/api/generate-otp-for-proposal-entry', {
                MobileNo: this.MobileNo
            }).then(res => {
                this.isData = 1;
            }).catch(err => {
                this.popupMessage('error', err.response.data.message)
            });
        }
    },
    mounted() {

    }
});

// $(document).ready(function(){

// })

function print() {
    jQuery('.wrapper').printThis();
}