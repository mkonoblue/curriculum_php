// 7章チェックテスト問1

let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓

for (let i = 0; i < 8; i++){
    if(numbers[i]%2==0){
        var num = numbers[i];
        isEven();
    }    
}

function isEven() {
    console.log(num + 'は偶数です');
}



// 7章チェックテスト問2

class Car{
    constructor(gass,number) {
        this.gass = gass;
        this.number = number;
    }

    getNumGas() {
        console.log(`ガソリンは${this.gass}です。ナンバーは${this.number}です。`);
    }

}

let newcar = new Car(50,1234);
    
newcar.getNumGas();

