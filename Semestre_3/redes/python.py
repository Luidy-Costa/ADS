
import socket
IP = "127.0.0.1"
PORTA = 12345

cliente= socket.socket(socket.AF_INET, socket.SOCK_STREAM)
cliente.connect((IP,PORTA))

mensagem = input ("manda a visão\n")
cliente.send(mensagem.encode())
cliente.close