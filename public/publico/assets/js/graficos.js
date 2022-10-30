function Graficar(canvas,data,type,Lavel){
    const ctx = document.getElementById(canvas)
    
    console.log(data);

    const colores = ['rgb(38, 186, 165,1)',
        'rgb(55, 95, 122,1)',
        'rgb(0, 191, 255,0.8)',// CELESTE
        'rgb(0, 139, 139,0.8)', // TURQUESA MAS CLARO
        'rgb(255, 20, 147,0.8)',// ROSADO
        'rgb(0, 128, 0,0.8)',//VERDE OSCURO HOJA
        'rgb(50, 205, 50,0.8)',// VERDE LECHUGA
        'rgb(255, 0, 255,0.8)', //FUCCIA CÑARP
        'rgb(255, 69, 0,0.8)',// NARANJA
        'rgb(148, 0, 211,0.8)', // LILA
        'rgb(255, 140, 0,0.8)', // NARANJA CLARO
        'rgb(199, 21, 133,0.8)',// ROSADO OSCURO
        'rgb(255, 0, 0,0.8)',// ROJO
        'rgb(0, 0, 255,0.8)', //ASUL OSCURO
    ];

    const cData = JSON.parse(data);
    const myChart = new Chart(ctx, {
        type: type,
        data: {
            labels: cData.label,
            datasets: [{
                label: Lavel,
                data: cData.data,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    });
}