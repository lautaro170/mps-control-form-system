<?php

namespace Database\Seeders;

use App\Enums\FormTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $formTemplates = [
            [
                "id" => 1,
                "description" => 'Informe de Servicio tecnico.',
                "type" => FormTypeEnum::INFORME_SERVICIO_TECNICO->value,
                "json_definition" => '{
  "id": 1,
  "locale": "es",
  "pages": [
    {
      "name": "page4",
      "title": {
        "es": "Datos Generales"
      },
      "elements": [
        {
          "type": "text",
          "name": "modelo",
          "title": {
            "es": "Modelo"
          }
        },
        {
          "type": "text",
          "name": "nro_de_serie",
          "title": {
            "es": "N° de Serie"
          }
        },
        {
          "type": "text",
          "name": "horas_km",
          "title": {
            "es": "Horas / Km"
          }
        },
        {
          "type": "text",
          "name": "arreglo",
          "title": {
            "es": "Arreglo"
          }
        }
      ]
    },
    {
      "name": "page2",
      "title": {
        "es": "Descripción del Trabajo"
      },
      "elements": [
        {
          "type": "radiogroup",
          "name": "estado",
          "title": {
            "es": "Estado"
          },
          "choices": [
            {
              "value": "trabajo_efectuado",
              "text": {
                "es": "Trabajo Efectuado"
              }
            },
            {
              "value": "trabajo_a_efectuar",
              "text": {
                "es": "Trabajo a Efectuar"
              }
            }
          ]
        },
        {
          "type": "comment",
          "name": "descripcion_del_trabajo",
          "title": {
            "es": "Descripción del Trabajo"
          }
        }
      ]
    },
    {
      "name": "page1",
      "title": {
        "es": "Observaciones"
      },
      "elements": [
        {
          "type": "comment",
          "name": "observaciones_varios",
          "title": {
            "es": "Observaciones / Varios"
          }
        }
      ]
    },
    {
      "name": "page3",
      "title": "Responsables",
      "elements": [
        {
          "type": "panel",
          "name": "tecnico_que_realiza_la_prueba",
          "title": {
            "default": "Técnico que realiza la prueba",
            "es": "Técnico "
          },
          "elements": [
            {
              "type": "text",
              "name": "tecnico_que_realiza_la_prueba_nombre",
              "title": "Nombre Completo"
            },
            {
              "type": "signaturepad",
              "name": "tecnico_que_realiza_la_prueba_firma",
              "title": "Firma",
              "placeholder": "Firma aquí"
            }
          ]
        },
        {
          "type": "panel",
          "name": "panel2",
          "title": "Responsable del cliente",
          "elements": [
            {
              "type": "text",
              "name": "responsable_del_cliente_nombre",
              "title": "Nombre Completo"
            },
            {
              "type": "signaturepad",
              "name": "responsable_del_cliente_firma",
              "title": "Firma",
              "placeholder": "Firma aquí"
            }
          ]
        }
      ]
    }
  ],
  "headerView": "advanced"
}',
            ],
            [
                "id" => 2,
                "description" => 'Este es un formulario de ejemplo para demostrar la funcionalidad del sistema.',
                "type" => FormTypeEnum::SERVICIO_TECNICO_GRUPO_ELECTROGENO->value,
                "json_definition" => '{
  "id": 2,
  "locale": "es",
  "pages": [
    {
      "name": "page5",
      "title": {
        "es": "Cliente"
      },
      "elements": [
        {
          "type": "text",
          "name": "cliente_smo",
          "title": {
            "es": "SMO"
          }
        },
        {
          "type": "text",
          "name": "cliente_direccion",
          "title": {
            "es": "Dirección"
          }
        },
        {
          "type": "text",
          "name": "cliente_localidad",
          "title": {
            "es": "Localidad"
          }
        },
        {
          "type": "text",
          "name": "horas_uso",
          "title": {
            "es": "Horas uso"
          }
        }
      ]
    },
    {
      "name": "page1",
      "title": "Datos del grupo Electrógeno",
      "elements": [
        {
          "type": "multipletext",
          "name": "marca",
          "title": "Datos del Grupo Electrógeno",
          "items": [
            {
              "name": "marca",
              "title": "Marca"
            },
            {
              "name": "modelo",
              "title": "Modelo"
            },
            {
              "name": "placa",
              "title": "Placa"
            },
            {
              "name": "potencia",
              "title": "Potencia"
            },
            {
              "name": "alternador",
              "title": "Alternador"
            },
            {
              "name": "alternador_nro",
              "title": "Alternador N°"
            },
            {
              "name": "alternador_serie",
              "title": "Alternador Serie"
            },
            {
              "name": "motor",
              "title": "Motor"
            },
            {
              "name": "motor_nro",
              "title": "Motor N°"
            },
            {
              "name": "motor_serie",
              "title": "Motor Serie"
            },
            {
              "name": "tablero_logica",
              "title": {
                "es": "Tablero/Lógica"
              }
            },
            {
              "name": "tablero_transferencia_automatica",
              "title": {
                "es": "Tablero Transferencia automática"
              }
            }
          ]
        },
        {
          "type": "matrix",
          "name": "ubicacion",
          "title": "Ubicación",
          "columns": [
            {
              "value": "Ubicacion Si",
              "text": "Si"
            },
            {
              "value": "Ubicacion No",
              "text": "No"
            }
          ],
          "rows": [
            "Intemperie",
            "Sala"
          ]
        },
        {
          "type": "matrix",
          "name": "tipo",
          "title": "Tipo",
          "columns": [
            {
              "value": "Tipo Si",
              "text": "Si"
            },
            {
              "value": "Tipo No",
              "text": "No"
            }
          ],
          "rows": [
            "Cabinado",
            "Chasis"
          ]
        }
      ]
    },
    {
      "name": "page2",
      "title": "Descripción del Trabajo",
      "elements": [
        {
          "type": "checkbox",
          "name": "question4",
          "title": "Motor Detenido",
          "choices": [
            {
              "value": "nivel de aceite",
              "text": "Nivel de aceite"
            },
            "Nivel de Refrigerante",
            "Restricción filtro de aire",
            "Tensión en correas",
            "Nivel de electrolito",
            "Gravedad de electrolito",
            "Estado de instalación eléctrica",
            "Cableado de potencia",
            "Cubo de ventilador, polea, y bomba de agua",
            "Ajuste montaje motor",
            "Estado admisión de aire",
            "Conexiones línea de combustible",
            "Cargador de bateria",
            "Precalentador",
            "Nivel de combustible",
            "Limpieza de radiador",
            "Ajuste bornes generador",
            "Tapa termostática"
          ]
        },
        {
          "type": "panel",
          "name": "motor_en_funcionamiento",
          "title": {
            "es": "Motor en Funcionamiento"
          },
          "elements": [
            {
              "type": "checkbox",
              "name": "Motor En Funcionamiento",
              "title": "Motor en funcionamiento",
              "titleLocation": "hidden",
              "choices": [
                {
                  "value": "Sistema de arranque1",
                  "text": "Sistema de arranque"
                },
                "Mangueras y conexiones",
                "Presión de aceite",
                "Temperatura de motor",
                "Vibraciones",
                "Antivibratorios",
                "Carga de alternador",
                "Llave termomagnética",
                "Seguridades",
                "Ventilación de generador",
                "Pérdidas de aceite",
                "Pérdidad de combustible",
                "Restricciones de escape",
                "Pérdidas de refrigerante"
              ]
            },
            {
              "type": "text",
              "name": "Motor En Funcionamiento Frecuencia",
              "title": {
                "es": "Frecuencia"
              }
            },
            {
              "type": "multipletext",
              "name": "Motor En Funcionamiento Voltaje",
              "title": {
                "es": "Voltaje"
              },
              "items": [
                {
                  "name": "Motor En Funcionamiento Voltaje R",
                  "title": {
                    "es": "R (Vca.)"
                  }
                },
                {
                  "name": "Motor En Funcionamiento Voltaje S",
                  "title": {
                    "es": "S (Vca.)"
                  }
                },
                {
                  "name": "Motor En Funcionamiento Voltaje T",
                  "title": {
                    "es": "T (Vca.)"
                  }
                }
              ]
            },
            {
              "type": "multipletext",
              "name": "Baterias",
              "title": {
                "es": "Baterias"
              },
              "items": [
                {
                  "name": "Marca Modelo",
                  "title": {
                    "es": "Marca/modelo"
                  }
                },
                {
                  "name": "Baterias Fecha",
                  "title": {
                    "es": "Fecha"
                  }
                }
              ]
            },
            {
              "type": "text",
              "name": "aislante_de_escape",
              "title": {
                "es": "Aislante de Escape"
              }
            }
          ]
        },
        {
          "type": "panel",
          "name": "Verifiacion con Carga",
          "title": {
            "es": "Verifiacion con Carga"
          },
          "elements": [
            {
              "type": "text",
              "name": "Verifiacion con Carga frecuencia",
              "title": {
                "es": "Frecuencia"
              }
            },
            {
              "type": "multipletext",
              "name": "Verifiacion con Carga Tension",
              "title": {
                "es": "Tensión"
              },
              "items": [
                {
                  "name": "Verifiacion con Carga Tension R",
                  "title": {
                    "es": "Fase R (Vca.)"
                  }
                },
                {
                  "name": "Verifiacion con Carga Tension S",
                  "title": {
                    "es": "Fase S (Vca.)"
                  }
                },
                {
                  "name": "Verifiacion con Carga Tension T",
                  "title": {
                    "es": "Fase T (Vca.)"
                  }
                }
              ]
            },
            {
              "type": "multipletext",
              "name": "Verifiacion con Carga Corriente",
              "title": {
                "es": "Corriente"
              },
              "items": [
                {
                  "name": "Verifiacion con Carga Corriente R",
                  "title": {
                    "es": "Fase R (Amp.)"
                  }
                },
                {
                  "name": "Verifiacion con Carga Corriente S",
                  "title": {
                    "es": "Fase S (Amp.)"
                  }
                },
                {
                  "name": "Verifiacion con Carga Corriente T",
                  "title": {
                    "es": "Fase T (Amp.)"
                  }
                }
              ]
            },
            {
              "type": "text",
              "name": "Verifiacion con Carga Corriente Tiempo de Prueba",
              "title": {
                "es": "Tiempo de Prueba"
              }
            }
          ]
        },
        {
          "type": "checkbox",
          "name": "question5",
          "title": "Limpieza",
          "choices": [
            "Filtros de aire de motor",
            "Respirador de carter",
            "Respirador de tanque de combustible",
            "Drenar tanque de combustible",
            "Cañerias y conexiones"
          ]
        },
        {
          "type": "checkbox",
          "name": "Sala de Grupo",
          "title": "Sala de Grupo",
          "choices": [
            "Estado general",
            "Matafuegos",
            "Luz de emergencia",
            "Indicaciones de emergencia",
            {
              "value": "Iluminacion",
              "text": "Iluminación"
            },
            {
              "value": "Circulacion de aire",
              "text": "Circulación de aire"
            },
            {
              "value": "Indicacion de arranque remoto",
              "text": "Indicación de arranque remoto"
            }
          ]
        },
        {
          "type": "checkbox",
          "name": "Cambio de Filtros Y Consumibles",
          "title": {
            "default": "Cambio de Filtros Y Consumibles",
            "es": "Cambio de Filtros Y Consumibles"
          },
          "choices": [
            {
              "value": "Filtro de aire",
              "text": {
                "es": "Filtro de aire"
              }
            },
            {
              "value": "Filtro de agua",
              "text": {
                "es": "Filtro de agua"
              }
            },
            {
              "value": "Filtro de combustible",
              "text": {
                "es": "Filtro de combustible"
              }
            },
            {
              "value": "Aceite",
              "text": {
                "es": "Aceite"
              }
            },
            {
              "value": "Refrigerante",
              "text": {
                "default": "Refrigerante",
                "es": "Refrigerante"
              }
            }
          ]
        }
      ]
    },
    {
      "name": "page4",
      "title": {
        "es": "Observaciones"
      },
      "elements": [
        {
          "type": "comment",
          "name": "Observaciones",
          "title": {
            "es": "Observaciones"
          }
        }
      ]
    },
    {
      "name": "page3",
      "title": "Responsables",
      "elements": [
        {
          "type": "panel",
          "name": "tecnico_que_realiza_la_prueba",
          "title": "Técnico que realiza la prueba",
          "elements": [
            {
              "type": "text",
              "name": "tecnico_que_realiza_la_prueba_nombre",
              "title": "Nombre Completo"
            },
            {
              "type": "signaturepad",
              "name": "tecnico_que_realiza_la_prueba_firma",
              "title": "Firma",
              "placeholder": "Firma aquí"
            }
          ]
        },
        {
          "type": "panel",
          "name": "panel2",
          "title": "Responsable del cliente",
          "elements": [
            {
              "type": "text",
              "name": "responsable_del_cliente_nombre",
              "title": "Nombre Completo"
            },
            {
              "type": "signaturepad",
              "name": "responsable_del_cliente_firma",
              "title": "Firma",
              "placeholder": "Firma aquí"
            }
          ]
        }
      ]
    }
  ],
  "headerView": "advanced"
}',
            ],
        ];

        foreach ($formTemplates as $formTemplate) {
            \App\Models\FormTemplate::updateOrCreate(
                ['id' => $formTemplate['id']],
                [
                    'description' => $formTemplate['description'],
                    'type' => $formTemplate['type'],
                    'json_definition' => $formTemplate['json_definition'],
                ]
            );
        }
    }
}
