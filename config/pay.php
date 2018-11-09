<?php

return [
    'alipay' => [
        'app_id'         => '2016092200566816',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAseKIOypRKY3pT+u1dspLaQB8b0F9DEuqee2/rZT9QZKSJbjajco4zj5bWSL4FKghPWLOwYDWfieUgJHAxxJmqFmpXUWMxsOU9EKq5Xd4kln2JYgX5D4T22JNC98K4QWoaKtvFIi2ccIHaRxNtNVIuqTSxEiQeIBb+rCWG1FD5EvkKIsgTlOxgxf0qsUwYXMpXvf2JB1LJ0iCXao3SIJERjRjDnrZdmF9rzoT9poT4akQsxYKXD0jemD40frN7Ir0oTljyr9hUKLbDGUfGC/6VBe62wi7KxhfSx8NX9LIeJzng/yTImuN6Mgnk2cGjdmYuUIrEhd3F/tim87tSDGEowIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEAucFMMNcY24zq3sHf7fWYsmWrjWIp8v2DhsweV1JCfYjQlpUBIzI2aGPOPYw95tfG2U5OBjSra6G/botIAJfrZUC1iQpf4cQfglZU/0RhM4ZmkqFC3bCiq6Lq3YlviTFcn/igJ+UfmYbD8Duxxu/iyG6rF++ahRMPwH/i0N3PpPnmISHqit3/jiHcwLPlKrjw/2Qpa84R3XOg2qq4zXYVR416iUhYbUGm/5sPUS85q9EP70NNsgFadVFQV9c5dzAEYbCW4RZ/P43Sr3JI0F05YEoH/MkLkz9JkLzYKlncMYJEhjMHLluYNhHqqwNx7Cg/5Ab7XgVJTbIytySNoFabYwIDAQABAoIBAQCvkMjoaISwDfJ3dBqoGDaodnu8d4lahs3ne8k5kyAQ8lzj1hVrJKxT4fEuLvza0Bq7jM0mBGX4prn+S1pUZUIxQwXRbqLNCccWM27GjeSpBGCyOgSu76HwQ11k4d8vdh4rfJwy2NYTD1LmHiWa92QLOL4xM1+CY0/CC51e+Canr4Tf4g3S0CL6Xn4oxtwZeJNh9YslvRUdscrF8OW3PsI/Qa3fhKok1eds1g/CBkS4HG6Fl1Wv8+huUUDk2HkG9lpLaMOC5KQsHRd5hmgtp9Dl4p0vPiFgJMx54n3iHo1joO0nQ/2bEImgD4tfPzx9nbpoePfDlZx7e5CX5OyNDo4RAoGBAOnXQE2GCGpYchhfuIPHefPf3J1SliqPaaOW+wCmFA/dbQarV4m0y5vkETI9YI6VjNyC5dgNmYz9AcbuNEgGyVI22Y90kA3k6YpHR/O5gDo5dfxVgr3Ah/S7+AQIoErsU56/QznJwGwpUTWK7PoIaMLaWGMiKXAV7p2nlAQlADMHAoGBAMtbiIBCMyLRN8/J5T/PhnOJaRdr5nLnFbM0NtVfcqVQ+4ZNkWnQUwMJfxUgnGSFMmkG4vBI55+RrgKDsWJNdtV4t0a5jbIdDE0kAY71OLQTHcv7iftWbDFVwKwBzPHMJzJk3/YheIK/TkDdF0mnz9JQsjB2dSVMyr+XLvt1fTHFAoGBAJMDAqg6ZbwGEuUD+MrQc/lAekBmFYZ4Vx/D4dXMk7xNpyeUPRqUEZXWUoFVWQkLOF3B5aJpGmoq/h0E0NWffp4zYZ/w1kgF7FVE7xVpQBZa3bRgRivpiQ/xxME0cyHnZcLd1/PSxSi66RVSXB3tf39RKlRYu9h90WBIZKQeZvutAoGAZmjWOSEdd289WBsopBXyc8TDc9QW3c6aEwE8i//hUHeT83KkxFDxPRpPMWiW2dhqJpIdPzy3yJgotYN0lTjFm4OLaMaRIR2X0FFNp5y+zZDC9LLcLgK7wayZtwXBHBPfuXUrhFwewFlvIyM0Uxd7hUK2Ocmt/PbLM+kC9Aea4LECgYAMYUPbXq9VWpbChYv1jF+iE+6Uhj/O+KoTqJsbS0E1MVo0yLUC7COwZsECkMBm/O10dsTTs39JJZz0Sf6fN3Qz+UU9WXIMR9WqfhJH6fBU4tQxxJyTmQo8Qsh8VhQ+8lIIr4rrM2RibxHI11NqBXW2hRjtSbHi0+s2jocEcqcZEw==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];