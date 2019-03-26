<?php

// JWT = JSON WEB TOKEN (Não confundir com chave de API)

/*

o JWT é dividido em 3 partes: header.payload.signature

Ex.: xxxxxx.yyyyyyy.zzzzzzzz

HEADER:
{
  "typ":"JWT".
  "alg":"HS256"
}

=> sdkfjdskfjdskfjkdsfkdf

PAYLOAD:
{
  (Registered claims)
  "iss":"meusite.com.br",
  "exp":123456789,
  "iat":321546879,
  "jti":"321f32ds1f23sd1f32sd1f32sdf",
  (Registered claims)
  "id_user":123
  (Private claims)
  "dffdsffsf":"asasdsadsfds"
}

=> kladjfjfsdlkfpqourpoqjfda

SIGNATURE
HS256( base64(header).base64(payload).CHAVE SECRETA )

=> fksdjfksdjfskdlfkjsdkfjdsf64sdf

JWT FINAL:

sdkfjdskfjdskfjkdsfkdf.kladjfjfsdlkfpqourpoqjfda.fksdjfksdjfskdlfkjsdkfjdsf64sdf

*/