import requests

url = "https://api.uzimei.uz/api/v1/imei/check"

headers = {
    "Content-Type": "application/json",
    "User-Agent": "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36",
}

data = {
    "imei": "868019046176625",
    "locale": "uz",
    "isResident": True,
}


response = requests.post(url, json=data, headers=headers)

if response.status_code == 200:
    json_data = response.json()
    print(json_data)
else:
    print("Xato yuz berdi. Status kod:", response.status_code)
    json_data = response.json()
    print(json_data)
