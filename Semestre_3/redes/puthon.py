import socket

IP = "127.0.0.1"
PORTA = 12345

server= socket.socket(socket.AF_INET, socket.SOCK_STREAM)
server.bind((IP,PORTA))
server.listen(1)
print("Aguardando o camarada TCP conectar")
conn, addr = server.accept()
print("deu tudo certo meu chapa, conectado ao IP")

mensagem = conn.recv(1024).decode()
print(f"Passei a visão '{mensagem}'")
conn.close