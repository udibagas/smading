import serial

class Sensor:
    def __init__(self, interface):
        try:
            self.my_serial = serial.Serial(interface, baudrate=9600, timeout=1)
        except Exception as e:
            exit(0)

    def get_suhu(self):
        self.my_serial.write('suhu')
        suhu = self.my_serial.readline()
        return int(suhu)

    def get_lembab(self):
        self.my_serial.write('lembab')
        kelembaban = self.my_serial.readline()
        return int(kelembaban)

    def get_gas(self):
        self.my_serial.write('gas')
        gas = self.my_serial.readline()
        return int(gas)

    def get_pintu(self):
        self.my_serial.write('pintu')
        pintu = self.my_serial.readline()
        return int(pintu)

    def get_arus(self):
        self.my_serial.write('arus')
        arus = self.my_serial.readline()
        return float(arus)

    def get_all(self):
        self.my_serial.write('all')
        data = self.my_serial.readline()
        # suhu, lembab, gas, pintu, arus
        return data.split(",")

    def close_serial(self):
        self.my_serial.close()
